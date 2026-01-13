<?php

namespace App\Exceptions\Github;

class RepositoryNotActiveException extends GithubDomainException
{
    public static function notReady(int $repositoryId): self
    {
        return new self(
            'Repository is not ready for synchronization',
            [
                'repository_id' => $repositoryId,
            ]
        );
    }
}
