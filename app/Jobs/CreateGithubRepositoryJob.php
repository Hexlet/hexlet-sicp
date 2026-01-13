<?php

namespace App\Jobs;

use App\Enums\GithubRepositoryStatus;
use App\Exceptions\Github\MissingGithubTokenException;
use App\Models\User;
use App\Services\GithubRepositoryService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;

class CreateGithubRepositoryJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $tries = 1;
    public $timeout = 300;

    public function __construct(
        public int $userId,
    ) {
    }

    public function handle(GithubRepositoryService $githubService): void
    {
        $user = User::findOrFail($this->userId);

        if (!$user->github_access_token) {
            throw MissingGithubTokenException::forUser($this->userId);
        }

        if ($user->githubRepository) {
            Log::channel('github')->warning('User already has GitHub repository', [
                'user_id' => $this->userId,
            ]);
            return;
        }

        $githubService->createRepository($user);
    }

    public function failed(\Throwable $exception): void
    {
        $repository = User::find($this->userId)?->githubRepository;

        $repository?->update([
            'status'     => GithubRepositoryStatus::Error,
            'last_error' => $exception->getMessage(),
        ]);

        Log::channel('github')->error('GitHub repository creation failed', [
            'user_id'       => $this->userId,
            'repository_id' => $repository?->id,
            'error'         => $exception->getMessage(),
        ]);
    }
}
