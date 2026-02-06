<?php

namespace App\Exceptions\Github;

class RepositoryAlreadyExistsException extends GithubDomainException
{
    public static function forRepository(string $owner, string $repositoryName): self
    {
        return new self(
            "GitHub repository '{$owner}/{$repositoryName}' already exists on this account",
            [
                'owner' => $owner,
                'repository_name' => $repositoryName,
            ]
        );
    }
}
