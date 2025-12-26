<?php

namespace App\Jobs;

use App\Enums\GithubRepositoryStatus;
use App\Models\GithubRepository;
use App\Services\GithubRepositoryService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class SetupGithubRepositoryJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $tries = 1;
    public $timeout = 300;
    public $backoff = 5;

    public function __construct(
        public int $repositoryId,
    ) {
    }

    public function handle(GithubRepositoryService $githubService): void
    {
        $repository = GithubRepository::findOrFail($this->repositoryId);
        $user = $repository->user;

        Log::channel('github')->info('Setting up GitHub repository', [
            'repository_id' => $this->repositoryId,
            'user_id' => $user->id,
        ]);

        $githubService->setupRepository($user, $repository);

        Log::channel('github')->info('GitHub repository setup completed', [
            'repository_id' => $this->repositoryId,
        ]);
    }

    public function failed(\Throwable $exception): void
    {
        Log::channel('github')->error('GitHub repository setup failed after all retries', [
            'repository_id' => $this->repositoryId,
            'error' => $exception->getMessage(),
        ]);

        GithubRepository::find($this->repositoryId)?->update([
            'status' => GithubRepositoryStatus::Error,
            'last_error' => $exception->getMessage(),
        ]);
    }
}
