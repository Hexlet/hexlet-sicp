<?php

namespace App\Jobs;

use App\Enums\GithubRepositoryStatus;
use App\Exceptions\Github\RepositoryNotFoundException;
use App\Models\GithubRepository;
use App\Models\User;
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
        public int $userId,
    ) {
    }

    public function handle(GithubRepositoryService $githubService): void
    {
        $user = User::findOrFail($this->userId);
        $repository = $user->githubRepository ?? throw RepositoryNotFoundException::forUser($this->userId);

        $githubService->setupRepository($user, $repository);
    }

    public function failed(\Throwable $exception): void
    {
        $repository = User::find($this->userId)?->githubRepository;

        $repository?->update([
            'status'     => GithubRepositoryStatus::Error,
            'last_error' => $exception->getMessage(),
        ]);

        Log::channel('github')->error('GitHub repository setup failed', [
            'user_id'       => $this->userId,
            'repository_id' => $repository?->id,
            'error' => $exception->getMessage(),
        ]);
    }
}
