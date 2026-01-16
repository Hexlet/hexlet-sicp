<?php

namespace App\States\GithubRepository;

class SyncFailed extends GithubRepositoryState
{
    public function label(): string
    {
        return 'Sync Failed';
    }
}
