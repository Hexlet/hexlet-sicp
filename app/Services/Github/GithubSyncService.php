<?php

namespace App\Services\Github;

use App\DTO\Github\SyncResultData;
use App\Enums\GithubRepositoryStatus;
use App\Enums\SyncDirection;
use App\Enums\SyncType;
use App\Exceptions\Github\GithubApiException;
use App\Exceptions\Github\GithubNotFoundException;
use App\Models\Exercise;
use App\Models\GithubRepository;
use App\Models\Solution;
use App\Models\User;
use App\States\GithubRepository\Synced;
use App\States\GithubRepository\SyncFailed;
use App\States\GithubRepository\Syncing;
use Log;

readonly class GithubSyncService
{
    public function __construct(
        private GithubClientFactory $clientFactory,
        private GithubExercisePathMapper $pathMapper,
        private RepositoryTemplateGenerator $templateGenerator,
        private SolutionContentExtractor $contentExtractor,
        private SolutionSelector $solutionSelector,
    ) {
    }

    public function syncToGithub(User $user, GithubRepository $repo, SyncType $syncType = SyncType::Manual): SyncResultData
    {
        $repo->state->transitionTo(Syncing::class);
        $repo->save();

        $run = new SyncRun(
            repo: $repo,
            type: $syncType,
            direction: SyncDirection::ToGithub,
            meta: [
                'user_id' => $user->id,
                'repository_full_name' => $repo->full_name,
                'branch' => $repo->default_branch,
            ]
        );

        $run->markStarted();
        $error = null;

        try {
            $solutionsToSync = $this->solutionSelector->getSolutionsForSync($user);

            if ($solutionsToSync->isEmpty()) {
                return $run->toData();
            }

            $client = $this->clientFactory->forUser($user);
            $contentsApi = $client->api('repo')->contents();

            foreach ($solutionsToSync as $solution) {
                $run->incrementScanned();
                $exercise = $solution->exercise;
                $filePath = $this->pathMapper->toFilePath($exercise);

                try {
                    $apiResult = $this->createOrUpdateSolutionFile(
                        $contentsApi,
                        $repo,
                        $filePath,
                        $solution
                    );

                    if ($apiResult) {
                        $commitSha = $apiResult['commit']['sha'] ?? null;

                        $run->addSynced(
                            solutionId: $solution->id,
                            filePath: $filePath,
                            commitSha: $commitSha
                        );
                    }
                } catch (\Throwable $e) {
                    $run->addFailed(
                        filePath: $filePath,
                        error: $e,
                        solutionId: $solution->id
                    );
                }
            }
        } catch (\Throwable $e) {
            $error = $e;

            Log::channel('github')->error('Sync to GitHub failed critically', [
                'user_id' => $user->id,
                'repository_id' => $repo->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        } finally {
            $this->finalizeSyncRun($repo, $run, $error);
        }

        return $run->toData();
    }

    public function syncFromGithub(User $user, GithubRepository $repo, SyncType $syncType = SyncType::Manual): SyncResultData
    {
        $repo->state->transitionTo(Syncing::class);
        $repo->save();

        $run = new SyncRun(
            repo: $repo,
            type: $syncType,
            direction: SyncDirection::FromGithub,
            meta: [
                'user_id' => $user->id,
                'repository_full_name' => $repo->full_name,
                'branch' => $repo->default_branch,
            ]
        );

        $run->markStarted();
        $error = null;

        try {
            $client = $this->clientFactory->forUser($user);
            $contentsApi = $client->api('repo')->contents();

            $solutionFiles = $this->getSolutionFilesFromGithub($user, $repo);

            foreach ($solutionFiles as $filePath) {
                $run->incrementScanned();
                $this->processSolutionFile($filePath, $contentsApi, $repo, $user, $run);
            }
        } catch (\Throwable $e) {
            $error = $e;

            Log::channel('github')->error('Sync from GitHub failed critically', [
                'user_id' => $user->id,
                'repository_id' => $repo->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        } finally {
            $this->finalizeSyncRun($repo, $run, $error);
        }

        return $run->toData();
    }

    private function createOrUpdateSolutionFile(
        $contentsApi,
        GithubRepository $repo,
        string $filePath,
        Solution $solution
    ): ?array {
        $exercise = $solution->exercise;
        $content = $this->templateGenerator->wrapSolutionContent($solution);

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

    private function getSolutionFilesFromGithub(User $user, GithubRepository $repo): array
    {
        $solutionFiles = [];

        try {
            $client = $this->clientFactory->forUser($user);
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

    private function processSolutionFile(
        string $filePath,
        $contentsApi,
        GithubRepository $repo,
        User $user,
        SyncRun $run
    ): void {
        try {
            $exercisePath = $this->pathMapper->fromFilePath($filePath);

            if (!$exercisePath) {
                $run->addSkipped();
                return;
            }

            $exercise = Exercise::where('path', $exercisePath)->first();

            if (!$exercise || !$exercise->hasTests()) {
                $run->addSkipped();
                return;
            }

            $fileData = $this->fetchFileContentFromGithub($filePath, $contentsApi, $repo);
            $solutionContent = $this->contentExtractor->extract(
                base64_decode($fileData['content'], true)
            );

            if ($this->shouldSkipSolution($solutionContent, $exercise, $user)) {
                $run->addSkipped();
                return;
            }

            $solution = new Solution();
            $solution->content = $solutionContent;
            $solution->user()->associate($user);
            $solution->exercise()->associate($exercise);
            $solution->save();

            $run->addSynced(
                solutionId: $solution->id,
                filePath: $filePath,
                commitSha: $fileData['sha'] ?? null
            );
        } catch (GithubNotFoundException $e) {
            $run->addSkipped();
        } catch (\Throwable $e) {
            $run->addFailed(
                filePath: $filePath,
                error: $e
            );
        }
    }

    private function fetchFileContentFromGithub(
        string $filePath,
        $contentsApi,
        GithubRepository $repo
    ): array {
        try {
            return $contentsApi->show($repo->owner, $repo->name, $filePath, $repo->default_branch);
        } catch (\Throwable $e) {
            if ($e->getCode() === 404 || str_contains($e->getMessage(), 'Not Found')) {
                throw GithubNotFoundException::forFile($filePath, $repo->full_name);
            }
            throw GithubApiException::from($e, [
                'file_path'  => $filePath,
                'repository' => $repo->full_name,
            ]);
        }
    }

    private function shouldSkipSolution(
        string $solutionContent,
        Exercise $exercise,
        User $user
    ): bool {
        $placeholderContent = $this->templateGenerator->getPlaceholderContent();
        if ($this->contentExtractor->isPlaceholder($solutionContent, $placeholderContent)) {
            return true;
        }

        $latestSolution = Solution::where('user_id', $user->id)
            ->where('exercise_id', $exercise->id)
            ->latest('id')
            ->first();

        return $latestSolution && $latestSolution->content === $solutionContent;
    }

    private function finalizeSyncRun(
        GithubRepository $repo,
        SyncRun $run,
        ?\Throwable $error
    ): void {
        if ($error) {
            $repo->state->transitionTo(SyncFailed::class);
            $repo->status = GithubRepositoryStatus::Error;
            $repo->last_error = $error->getMessage();
        } else {
            $repo->last_sync_at = now();
            $repo->state->transitionTo(Synced::class);
            $repo->status = GithubRepositoryStatus::Active;
            $repo->last_error = null;
        }
        $repo->save();

        $run->markFinished();
        $data = $run->toData();
        Log::channel('github')->info($data->getSummary(), $data->toArray());

        if ($error) {
            throw $error;
        }
    }
}
