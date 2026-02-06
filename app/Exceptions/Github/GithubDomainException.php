<?php

namespace App\Exceptions\Github;

class GithubDomainException extends \RuntimeException
{
    public function __construct(
        string $message,
        public array $context = [],
        ?\Throwable $previous = null,
        int $code = 0
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function getContext(): array
    {
        return $this->context;
    }
}
