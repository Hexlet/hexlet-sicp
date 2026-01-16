<?php

namespace App\States\GithubRepository;

class FillFailed extends GithubRepositoryState
{
    public function label(): string
    {
        return 'Repository Fill Failed';
    }
}
