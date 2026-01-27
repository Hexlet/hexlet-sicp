<?php

namespace App\Exceptions\Github;

class MissingGithubTokenException extends GithubDomainException
{
    public static function forUser(int $userId): self
    {
        return new self(
            'User does not have GitHub access token',
            ['user_id' => $userId]
        );
    }
}
