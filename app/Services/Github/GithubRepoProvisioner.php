<?php

namespace App\Services\Github;

use App\Enums\GithubRepositoryStatus;
use App\Exceptions\Github\GithubApiException;
use App\Exceptions\Github\GithubNotFoundException;
use App\Exceptions\Github\RepositoryAlreadyExistsException;
use App\Models\Exercise;
use App\Models\GithubRepository;
use App\Models\User;
use App\States\GithubRepository\CreateFailed;
use App\States\GithubRepository\Created;
use App\States\GithubRepository\Creating;
use App\States\GithubRepository\FillFailed;
use App\States\GithubRepository\Filled;
use App\States\GithubRepository\Filling;
use Github\Client as GitHubClient;
use Log;

class GithubRepoProvisioner
{
    private const string REPOSITORY_NAME = 'sicp-solutions';
    private const string REPOSITORY_DESCRIPTION = 'My solutions for SICP exercises from Hexlet';
    private const string DEFAULT_BRANCH = 'main';

    public function __construct(
        private readonly GithubClientFactory $clientFactory,
        private readonly RepositoryTemplateGenerator $templateGenerator,
        private readonly GithubExercisePathMapper $pathMapper,
    ) {
    }

    public function createRepository(User $user): GithubRepository
    {
        $client = $this->clientFactory->forUser($user);

        $repo = new GithubRepository([
            'user_id' => $user->id,
            'name' => self::REPOSITORY_NAME,
        ]);
        $repo->save();

        $repo->state->transitionTo(Creating::class);
        $repo->save();

        Log::channel('github')->info('Creating GitHub repository', [
            'user_id' => $user->id,
            'github_name' => $user->github_name,
            'repository_name' => self::REPOSITORY_NAME,
        ]);

        try {
            if ($this->repositoryExistsOnGithub($client, $user)) {
                throw RepositoryAlreadyExistsException::forRepository($user->github_name, self::REPOSITORY_NAME);
            }

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
        } catch (\Throwable $e) {
            $repo->state->transitionTo(CreateFailed::class);
            $repo->status = GithubRepositoryStatus::Error;
            $repo->save();

            throw GithubApiException::from($e, [
                'user_id' => $user->id,
                'repository_name' => self::REPOSITORY_NAME,
            ]);
        }

        $defaultBranch = $repoData['default_branch'] ?? self::DEFAULT_BRANCH;

        $repo->default_branch = $defaultBranch;
        $repo->state->transitionTo(Created::class);
        $repo->status = GithubRepositoryStatus::Active;
        $repo->save();

        Log::channel('github')->info('GitHub repository created successfully', [
            'user_id' => $user->id,
            'repository_name' => self::REPOSITORY_NAME,
            'repository_url' => $repoData['html_url'] ?? 'unknown',
            'default_branch' => $defaultBranch,
        ]);

        return $repo;
    }

    public function setupRepository(User $user, GithubRepository $repo): void
    {
        Log::channel('github')->info('Starting repository setup', [
            'user_id' => $user->id,
            'repository_id' => $repo->id,
            'repository_name' => $repo->full_name,
        ]);

        $repo->state->transitionTo(Filling::class);
        $repo->save();

        try {
            $client = $this->clientFactory->forUser($user);
            $this->createInitialCommits($client, $repo);

            $repo->state->transitionTo(Filled::class);
            $repo->status = GithubRepositoryStatus::Active;
            $repo->save();

            Log::channel('github')->info('GitHub repository structure created', [
                'repository_id' => $repo->id,
            ]);
        } catch (\Throwable $e) {
            $repo->state->transitionTo(FillFailed::class);
            $repo->status = GithubRepositoryStatus::Error;
            $repo->save();

            throw $e;
        }
    }

    private function createInitialCommits(GitHubClient $client, GithubRepository $repo): void
    {
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
        $workflowContent = $this->templateGenerator->generateGitHubActionsWorkflow();

        $result = $contentsApi->create(
            $repo->owner,
            $repo->name,
            '.github/workflows/test.yml',
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

    private function generateRepositoryStructure(): array
    {
        $files = [];
        $files['README.md'] = $this->templateGenerator->generateReadme();
        $files['.gitignore'] = $this->templateGenerator->generateGitignore();
        $files['scripts/test-exercises.sh'] = $this->templateGenerator->generateTestScript();

        $exercises = Exercise::with('chapter')->get();

        foreach ($exercises as $exercise) {
            if (!$exercise->hasTests()) {
                continue;
            }

            $filePath = $this->pathMapper->toFilePath($exercise);
            $exerciseDir = dirname($filePath);

            $files["{$exerciseDir}/solution.rkt"] = $this->templateGenerator->generateExerciseSolution($exercise);
            $files["{$exerciseDir}/test.rkt"] = $this->templateGenerator->generateExerciseTests($exercise);
        }

        return $files;
    }

    private function repositoryExistsOnGithub(GitHubClient $client, User $user): bool
    {
        try {
            $client->api('repo')->show($user->github_name, self::REPOSITORY_NAME);
            return true;
        } catch (\Throwable $e) {
            if ($e->getCode() === 404) {
                return false;
            }
            throw $e;
        }
    }
}
