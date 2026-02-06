<?php

namespace App\Services;

use App\DTO\Github\SyncResultData;
use App\Enums\SyncType;
use App\Models\GithubRepository;
use App\Models\User;
use App\Services\Github\GithubRepoProvisioner;

readonly class GithubRepositoryService
{
    public function __construct(
        private GithubRepoProvisioner $provisioner,
        private Github\GithubSyncService $syncService,
    ) {
    }

    public function createRepository(User $user): GithubRepository
    {
        return $this->provisioner->createRepository($user);
    }

    public function setupRepository(User $user, GithubRepository $repo): void
    {
        $this->provisioner->setupRepository($user, $repo);
    }

    public function syncToGithub(User $user, GithubRepository $repo, SyncType $syncType = SyncType::Manual): SyncResultData
    {
        return $this->syncService->syncToGithub($user, $repo, $syncType);
    }

    public function syncFromGithub(User $user, GithubRepository $repo, SyncType $syncType = SyncType::Manual): SyncResultData
    {
        return $this->syncService->syncFromGithub($user, $repo, $syncType);
    }
}
