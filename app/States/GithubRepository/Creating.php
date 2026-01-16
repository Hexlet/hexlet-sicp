<?php

namespace App\States\GithubRepository;

class Creating extends GithubRepositoryState
{
    public function label(): string
    {
        return 'Creating Repository';
    }
}
