<?php

namespace App\Exceptions\Github;

class GithubNotFoundException extends GithubApiException
{
    public static function forResource(string $resource, array $context = []): self
    {
        return new self(
            sprintf('GitHub resource not found: %s', $resource),
            array_merge(['resource' => $resource], $context),
            null,
            404
        );
    }

    public static function forFile(string $filePath, string $repository): self
    {
        return self::forResource($filePath, [
            'file_path' => $filePath,
            'repository' => $repository,
        ]);
    }
}
