<?php

namespace App\Jobs;

use App\Enums\GithubRepositoryStatus;
use App\Enums\SyncType;
use App\Models\User;
use App\Services\GithubRepositoryService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class SyncSolutionsToGithubJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $tries = 3;
    public $timeout = 300;

    public function __construct(
        public int $userId,
    ) {
    }

    public function handle(GithubRepositoryService $githubService): void
    {
        $user = User::findOrFail($this->userId);
        $repository = $user->githubRepository;

        Log::channel('github')->info('Starting manual solutions sync', [
            'user_id' => $this->userId,
            'repository_id' => $repository?->id,
        ]);

        if (!$repository) {
            $this->fail(new \Exception('Repository not found'));
            return;
        }

        if ($repository->status !== GithubRepositoryStatus::Active) {
            $this->fail(new \Exception("Repository status is {$repository->status->value}, expected Active"));
            return;
        }

        Log::channel('github')->info('Syncing to GitHub...', ['user_id' => $this->userId]);
        $githubService->syncExistingSolutions($user, $repository, SyncType::Manual);

        Log::channel('github')->info('Syncing from GitHub...', ['user_id' => $this->userId]);
        $githubService->syncFromGithub($user, $repository);

        $repository->update(['last_sync_at' => now()]);

        Log::channel('github')->info('Bidirectional sync completed', [
            'user_id' => $this->userId,
            'repository_id' => $repository->id,
        ]);
    }

    public function failed(\Throwable $exception): void
    {
        $repository = User::find($this->userId)?->githubRepository;

        Log::channel('github')->error('Sync solutions job failed permanently', [
            'user_id' => $this->userId,
            'repository_id' => $repository?->id,
            'error' => $exception->getMessage(),
        ]);

        $repository?->update([
            'status' => GithubRepositoryStatus::Error,
            'last_error' => $exception->getMessage(),
        ]);
    }
}
