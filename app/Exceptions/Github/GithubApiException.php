<?php

namespace App\Exceptions\Github;

class GithubApiException extends GithubDomainException
{
    public static function from(\Throwable $exception, array $context = []): self
    {
        return new self(
            sprintf('GitHub API error: %s', $exception->getMessage()),
            array_merge([
                'original_code' => $exception->getCode(),
                'original_class' => $exception::class,
            ], $context),
            $exception
        );
    }
}
