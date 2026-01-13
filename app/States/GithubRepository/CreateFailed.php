<?php

namespace App\States\GithubRepository;

class CreateFailed extends GithubRepositoryState
{
    public function label(): string
    {
        return 'Repository Creation Failed';
    }
}
