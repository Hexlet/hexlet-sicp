<?php

namespace App\Jobs;

use App\Enums\GithubRepositoryStatus;
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
            $this->fail(new \Exception('User does not have GitHub access token'));
            return;
        }

        if ($user->githubRepository) {
            Log::channel('github')->warning('User already has GitHub repository', [
                'user_id' => $this->userId,
            ]);
            return;
        }

        $repository = $githubService->createRepository($user);

        Log::channel('github')->info('GitHub repository created, starting setup', [
            'user_id' => $this->userId,
            'repository_id' => $repository->id,
        ]);

        SetupGithubRepositoryJob::dispatch($repository->id)->delay(now()->addSeconds(5));
    }

    public function failed(\Throwable $exception): void
    {
        Log::channel('github')->error('GitHub repository creation job failed after all retries', [
            'user_id' => $this->userId,
            'error' => $exception->getMessage(),
        ]);

        User::find($this->userId)?->githubRepository?->update([
            'status' => GithubRepositoryStatus::Error,
            'last_error' => $exception->getMessage(),
        ]);
    }
}
