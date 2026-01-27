<?php

namespace App\States\GithubRepository;

class Created extends GithubRepositoryState
{
    public function label(): string
    {
        return 'Repository Created';
    }
}
