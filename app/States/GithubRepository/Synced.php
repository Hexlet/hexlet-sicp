<?php

namespace App\States\GithubRepository;

class Synced extends GithubRepositoryState
{
    public function label(): string
    {
        return 'Fully Synced';
    }
}
