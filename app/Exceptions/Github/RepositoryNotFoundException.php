<?php

namespace App\Exceptions\Github;

class RepositoryNotFoundException extends GithubDomainException
{
    public static function forUser(int $userId): self
    {
        return new self(
            'Repository not found for user',
            ['user_id' => $userId]
        );
    }
}
