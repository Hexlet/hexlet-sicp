<?php

namespace App\Jobs;

use App\Enums\GithubRepositoryStatus;
use App\Enums\SyncDirection;
use App\Enums\SyncType;
use App\Exceptions\Github\RepositoryNotActiveException;
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

class SyncSolutionsJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $tries = 3;
    public $timeout = 300;

    public function __construct(
        public int $userId,
        public ?SyncDirection $direction = null,
        public SyncType $syncType = SyncType::Manual,
    ) {
    }

    public function handle(GithubRepositoryService $githubService): void
    {
        $user = User::findOrFail($this->userId);
        $repository = $user->githubRepository ?? throw RepositoryNotFoundException::forUser($this->userId);

        if ($repository->status === null) {
            throw RepositoryNotActiveException::notReady($repository->id);
        }

        match ($this->direction) {
            null => $this->syncBoth($githubService, $user, $repository),
            SyncDirection::ToGithub => $githubService->syncToGithub($user, $repository, $this->syncType),
            SyncDirection::FromGithub => $githubService->syncFromGithub($user, $repository, $this->syncType),
        };
    }

    private function syncBoth(GithubRepositoryService $githubService, User $user, GithubRepository $repo): void
    {
        $githubService->syncToGithub($user, $repo, $this->syncType);
        $githubService->syncFromGithub($user, $repo, $this->syncType);
    }

    public function failed(\Throwable $exception): void
    {
        $repository = User::find($this->userId)?->githubRepository;

        $repository?->update([
            'status'     => GithubRepositoryStatus::Error,
            'last_error' => $exception->getMessage(),
        ]);

        Log::channel('github')->error('Solutions sync failed', [
            'user_id'       => $this->userId,
            'repository_id' => $repository?->id,
            'error'         => $exception->getMessage(),
        ]);
    }
}
