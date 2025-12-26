<?php

namespace App\Services;

use App\Enums\GithubRepositoryStatus;
use App\Enums\SyncStatus;
use App\Enums\SyncType;
use App\Models\Exercise;
use App\Models\GithubRepository;
use App\Models\Solution;
use App\Models\SolutionSyncLog;
use App\Models\User;
use Github\Client as GitHubClient;
use Log;

class GithubRepositoryService
{
    public const string REPOSITORY_NAME = 'sicp-solutions';
    public const string REPOSITORY_DESCRIPTION = 'SICP exercises solutions';
    public const string DEFAULT_BRANCH = 'main';

    private const string TEMPLATES_PATH = 'templates/github';

    private const array TEMPLATE_PATHS = [
        'readme' => 'README.md',
        'gitignore' => '.gitignore',
        'workflow' => '.github/workflows/test.yml',
        'test_script' => 'scripts/test-exercises.sh',
        'solution' => 'solution.rkt.template',
        'tests' => 'tests.rkt.template',
        'solution_wrapper' => 'solution-wrapper.rkt.template',
    ];

    public function createRepository(User $user): GithubRepository
    {
        if (!$user->github_access_token) {
            throw new \Exception('User does not have GitHub access token');
        }

        $client = $this->createClientForUser($user);

        Log::channel('github')->info('Creating GitHub repository', [
            'user_id' => $user->id,
            'github_name' => $user->github_name,
            'repository_name' => self::REPOSITORY_NAME,
        ]);

        $repoData = $client->api('repo')->create(
            self::REPOSITORY_NAME,
            self::REPOSITORY_DESCRIPTION,
            // homepage
            '',
            // public
            true,
            // organization
            null,
            // has_issues
            true,
            // has_wiki
            true,
            // has_downloads
            true,
            // team_id
            null,
            // auto_init - create initial commit (need for Git Data API)
            true
        );

        $defaultBranch = $repoData['default_branch'] ?? self::DEFAULT_BRANCH;

        Log::channel('github')->info('GitHub repository created successfully', [
            'user_id' => $user->id,
            'repository_name' => self::REPOSITORY_NAME,
            'repository_url' => $repoData['html_url'] ?? 'unknown',
            'default_branch' => $defaultBranch,
        ]);

        $repo = new GithubRepository([
            'user_id' => $user->id,
            'name' => self::REPOSITORY_NAME,
            'default_branch' => $defaultBranch,
            'status' => GithubRepositoryStatus::Pending,
        ]);
        $repo->save();

        return $repo;
    }

    public function setupRepository(User $user, GithubRepository $repo): void
    {
        Log::channel('github')->info('Starting repository setup', [
            'user_id' => $user->id,
            'repository_id' => $repo->id,
            'repository_name' => $repo->full_name,
        ]);

        $this->createInitialCommits($user, $repo);

        $this->syncExistingSolutions($user, $repo);

        $repo->status = GithubRepositoryStatus::Active;
        $repo->last_sync_at = now();
        $repo->save();
    }

    private function createClientForUser(User $user): GitHubClient
    {
        $client = new GitHubClient();
        $client->authenticate($user->github_access_token, null, GitHubClient::AUTH_ACCESS_TOKEN);
        return $client;
    }

    private function generateRepositoryStructure(): array
    {
        $files = [];
        $files['README.md'] = $this->generateReadme();
        $files['.gitignore'] = $this->generateGitignore();
        $files['scripts/test-exercises.sh'] = $this->generateTestScript();

        $exercises = Exercise::with('chapter')->get();

        foreach ($exercises as $exercise) {
            if (!$exercise->hasTests()) {
                continue;
            }

            $chapterNum = $this->getChapterNumber($exercise);
            $exerciseName = str_replace('.', '-', $exercise->path);
            $exerciseDir = "chapter-{$chapterNum}/exercise-{$exerciseName}";

            $files["{$exerciseDir}/solution.rkt"] = $this->generateExerciseSolution($exercise);
            $files["{$exerciseDir}/test.rkt"] = $this->generateExerciseTests($exercise);
        }

        return $files;
    }

    private function getChapterNumber(Exercise $exercise): int
    {
        return (int) explode('.', $exercise->path)[0];
    }

    private function createInitialCommits(User $user, GithubRepository $repo): void
    {
        $client = $this->createClientForUser($user);

        try {
            $this->addRepositoryStructureCommit($client, $repo);
            $this->addWorkflowCommit($client, $repo);
        } catch (\Exception $e) {
            Log::channel('github')->error('Failed to create initial commit', [
                'error' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'repository' => $repo->full_name,
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

    private function addWorkflowCommit(GitHubClient $client, GithubRepository $repo): void
    {
        $contentsApi = $client->api('repo')->contents();
        $workflowContent = $this->generateGitHubActionsWorkflow();

        $result = $contentsApi->create(
            $repo->owner,
            $repo->name,
            self::TEMPLATE_PATHS['workflow'],
            $workflowContent,
            'Add GitHub Actions workflow',
            $repo->default_branch
        );

        Log::channel('github')->info('Workflow commit created', [
            'commit_sha' => $result['commit']['sha'] ?? 'unknown',
        ]);
    }

    private function addRepositoryStructureCommit(GitHubClient $client, GithubRepository $repo): void
    {
        $files = $this->generateRepositoryStructure();

        Log::channel('github')->info('Repository structure generated', [
            'files_count' => count($files),
        ]);

        $gitDataApi = $client->api('gitData');

        $ref = $client->api('gitData')->references()
            ->show($repo->owner, $repo->name, 'heads/' . $repo->default_branch);
        $latestCommitSha = $ref['object']['sha'];

        $latestCommit = $gitDataApi->commits()->show($repo->owner, $repo->name, $latestCommitSha);
        $baseTreeSha = $latestCommit['tree']['sha'];

        $blobs = [];
        foreach ($files as $path => $content) {
            $blob = $gitDataApi->blobs()->create($repo->owner, $repo->name, [
                'content' => base64_encode($content),
                'encoding' => 'base64',
            ]);
            $blobs[$path] = $blob['sha'];
        }

        Log::channel('github')->info('Blobs created', ['count' => count($blobs)]);

        $tree = [];
        foreach ($blobs as $path => $sha) {
            $tree[] = [
                'path' => $path,
                'mode' => '100644',
                'type' => 'blob',
                'sha' => $sha,
            ];
        }

        $treeData = $gitDataApi->trees()->create($repo->owner, $repo->name, [
            'tree' => $tree,
            'base_tree' => $baseTreeSha,
        ]);

        $commit = $gitDataApi->commits()->create($repo->owner, $repo->name, [
            'message' => 'Add repository structure',
            'tree' => $treeData['sha'],
            'parents' => [$latestCommitSha],
        ]);

        $client->api('gitData')->references()->update(
            $repo->owner,
            $repo->name,
            'heads/' . $repo->default_branch,
            ['sha' => $commit['sha'], 'force' => false]
        );

        Log::channel('github')->info('Repository structure commit created', [
            'commit_sha' => $commit['sha'],
            'files_count' => count($files),
        ]);
    }

    public function syncExistingSolutions(User $user, GithubRepository $repo, SyncType $syncType = SyncType::Initial): void
    {
        $solutions = Solution::where('user_id', $user->id)
            ->latestPerExercise()
            ->with('exercise')
            ->get();

        if ($solutions->isEmpty()) {
            return;
        }

        $client = $this->createClientForUser($user);
        $contentsApi = $client->api('repo')->contents();

        $syncedSolutions = [];

        foreach ($solutions as $solution) {
            $exercise = $solution->exercise;

            if (!$exercise || !$exercise->hasTests() || !$this->shouldSyncSolution($solution, $repo)) {
                continue;
            }

            $chapterNum = $this->getChapterNumber($exercise);
            $exerciseName = str_replace('.', '-', $exercise->path);
            $filePath = "chapter-{$chapterNum}/exercise-{$exerciseName}/solution.rkt";

            $result = $this->createOrUpdateSolutionFile(
                $contentsApi,
                $repo,
                $filePath,
                $solution
            );

            if ($result) {
                $syncedSolutions[] = [
                    'solution' => $solution,
                    'file_path' => $filePath,
                    'commit_sha' => $result['commit']['sha'] ?? null,
                ];
            }
        }

        foreach ($syncedSolutions as $item) {
            SolutionSyncLog::create([
                'github_repository_id' => $repo->id,
                'solution_id' => $item['solution']->id,
                'sync_type' => $syncType,
                'commit_sha' => $item['commit_sha'],
                'file_path' => $item['file_path'],
                'status' => SyncStatus::Success,
            ]);
        }

        $repo->last_sync_at = now();
        $repo->save();

        Log::channel('github')->info('Solutions sync completed', [
            'synced' => count($syncedSolutions),
            'total' => $solutions->count(),
        ]);
    }

    private function shouldSyncSolution(Solution $solution, GithubRepository $repo): bool
    {
        $lastSync = SolutionSyncLog::where('github_repository_id', $repo->id)
            ->where('solution_id', $solution->id)
            ->where('status', SyncStatus::Success)
            ->latest('created_at')
            ->first();

        if (!$lastSync) {
            return true;
        }

        return $solution->updated_at > $lastSync->created_at;
    }

    private function createOrUpdateSolutionFile(
        $contentsApi,
        GithubRepository $repo,
        string $filePath,
        Solution $solution
    ): ?array {
        $exercise = $solution->exercise;
        $content = $this->wrapSolutionContent($solution);

        if ($contentsApi->exists($repo->owner, $repo->name, $filePath, $repo->default_branch)) {
            try {
                $existingFile = $contentsApi->show($repo->owner, $repo->name, $filePath, $repo->default_branch);
                return $contentsApi->update(
                    $repo->owner,
                    $repo->name,
                    $filePath,
                    $content,
                    "Update solution for exercise {$exercise->path}",
                    $existingFile['sha'],
                    $repo->default_branch
                );
            } catch (\Exception $e) {
                Log::channel('github')->warning('Failed to update solution', [
                    'solution_id' => $solution->id,
                    'file_path' => $filePath,
                    'error' => $e->getMessage(),
                ]);
                return null;
            }
        }

        try {
            return $contentsApi->create(
                $repo->owner,
                $repo->name,
                $filePath,
                $content,
                "Add solution for exercise {$exercise->path}",
                $repo->default_branch
            );
        } catch (\Exception $e) {
            Log::channel('github')->warning('Failed to create solution', [
                'solution_id' => $solution->id,
                'file_path' => $filePath,
                'error' => $e->getMessage(),
            ]);
            return null;
        }
    }

    public function syncFromGithub(User $user, GithubRepository $repo): void
    {
        $client = $this->createClientForUser($user);
        $contentsApi = $client->api('repo')->contents();

        $syncedCount = 0;
        $skippedCount = 0;

        try {
            $solutionFiles = $this->getSolutionFilesFromGithub($user, $repo);

            foreach ($solutionFiles as $filePath) {
                try {
                    if (!preg_match('#^chapter-(\d+)/exercise-(\d+-\d+)/solution\.rkt$#', $filePath, $matches)) {
                        continue;
                    }

                    $exercisePath = str_replace('-', '.', $matches[2]);

                    $exercise = Exercise::where('path', $exercisePath)->first();
                    if (!$exercise || !$exercise->hasTests()) {
                        continue;
                    }

                    $fileData = $contentsApi->show($repo->owner, $repo->name, $filePath, $repo->default_branch);
                    $fullContent = base64_decode($fileData['content'], true);

                    $solutionContent = $this->extractSolutionContent($fullContent);

                    $latestSolution = Solution::where('user_id', $user->id)
                        ->where('exercise_id', $exercise->id)
                        ->latest('id')
                        ->first();

                    if ($latestSolution && $latestSolution->content === $solutionContent) {
                        continue;
                    }

                    $solution = new Solution();
                    $solution->user_id = $user->id;
                    $solution->exercise_id = $exercise->id;
                    $solution->content = $solutionContent;
                    $solution->save();

                    SolutionSyncLog::create([
                        'github_repository_id' => $repo->id,
                        'solution_id' => $solution->id,
                        'sync_type' => SyncType::Manual,
                        'commit_sha' => $fileData['sha'] ?? null,
                        'file_path' => $filePath,
                        'status' => SyncStatus::Success,
                    ]);

                    Log::channel('github')->debug('Solution synced from GitHub', [
                        'exercise_path' => $exercise->path,
                        'file' => $filePath,
                    ]);
                } catch (\Exception $e) {
                    if (str_contains($e->getMessage(), 'Not Found')) {
                        continue;
                    }

                    Log::channel('github')->warning('Failed to fetch solution from GitHub', [
                        'exercise_path' => $exercise->path,
                        'error' => $e->getMessage(),
                    ]);
                }
            }

            Log::channel('github')->info('Sync from GitHub completed', [
                'synced' => $syncedCount,
                'skipped' => $skippedCount,
            ]);
        } catch (\Exception $e) {
            Log::channel('github')->error('Failed to sync from GitHub', [
                'error' => $e->getMessage(),
            ]);
            throw $e;
        }
    }

    private function generateReadme(): string
    {
        $template = \File::get($this->getTemplatePath(self::TEMPLATE_PATHS['readme']));
        $totalExercises = Exercise::count();

        return str_replace(
            '{total_exercises}',
            $totalExercises,
            $template
        );
    }

    private function generateGitignore(): string
    {
        return \File::get($this->getTemplatePath(self::TEMPLATE_PATHS['gitignore']));
    }

    private function generateGitHubActionsWorkflow(): string
    {
        return \File::get($this->getTemplatePath(self::TEMPLATE_PATHS['workflow']));
    }

    private function generateTestScript(): string
    {
        return \File::get($this->getTemplatePath(self::TEMPLATE_PATHS['test_script']));
    }

    private function generateExerciseSolution(Exercise $exercise): string
    {
        $template = \File::get($this->getTemplatePath(self::TEMPLATE_PATHS['solution']));
        $exerciseUrl = $this->getExerciseUrl($exercise);

        return str_replace(
            ['{exercise_path}', '{exercise_url}'],
            [$exercise->path, $exerciseUrl],
            $template
        );
    }

    private function generateExerciseTests(Exercise $exercise): string
    {
        $template = \File::get($this->getTemplatePath(self::TEMPLATE_PATHS['tests']));
        $tests = $exercise->getExerciseTests();

        return str_replace(
            ['{exercise_path}', '{tests}'],
            [$exercise->path, $tests],
            $template
        );
    }

    private function wrapSolutionContent(Solution $solution): string
    {
        $template = \File::get($this->getTemplatePath(self::TEMPLATE_PATHS['solution_wrapper']));
        $exercise = $solution->exercise;
        $exerciseUrl = $this->getExerciseUrl($exercise);
        $content = $solution->content;

        return str_replace(
            ['{exercise_path}', '{exercise_url}', '{content}'],
            [$exercise->path, $exerciseUrl, $content],
            $template
        );
    }

    private function getSolutionFilesFromGithub(User $user, GithubRepository $repo): array
    {
        $solutionFiles = [];

        try {
            $client = $this->createClientForUser($user);
            $tree = $client->api('git')->trees()->show(
                $repo->owner,
                $repo->name,
                $repo->default_branch,
                true
            );

            foreach ($tree['tree'] as $item) {
                if ($item['type'] === 'blob' && str_ends_with($item['path'], '/solution.rkt')) {
                    $solutionFiles[] = $item['path'];
                }
            }
        } catch (\Exception $e) {
            Log::channel('github')->warning('Failed to fetch repository tree from GitHub', [
                'repository' => $repo->full_name,
                'error' => $e->getMessage(),
            ]);
        }

        return $solutionFiles;
    }

    private function extractSolutionContent(string $fullContent): string
    {
        if (preg_match('/;;;?\s*BEGIN SOLUTION\s*\n(.*?)\n;;;?\s*END SOLUTION/s', $fullContent, $matches)) {
            return trim($matches[1]);
        }

        $lines = explode("\n", $fullContent);
        $contentLines = [];
        $skipHeaders = true;

        foreach ($lines as $line) {
            if ($skipHeaders) {
                if (preg_match('/^(#lang|^\(provide|\s*$|;;;\s*(Exercise|See:))/', $line)) {
                    continue;
                }
                $skipHeaders = false;
            }
            $contentLines[] = $line;
        }

        return trim(implode("\n", $contentLines));
    }

    private function getTemplatePath(string $template): string
    {
        return resource_path(self::TEMPLATES_PATH . '/' . $template);
    }

    private function getExerciseUrl(Exercise $exercise): string
    {
        return "https://sicp.hexlet.io/exercises/{$exercise->path}";
    }
}
