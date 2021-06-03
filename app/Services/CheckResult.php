<?php

declare(strict_types=1);

namespace App\Services;

class CheckResult
{
    private const SUCCESS_EXIT_CODE = 0;
    private const FAILED_TESTS_EXIT_CODE = 1;

    private const SUCCESS_STATUS = 'success';
    private const TESTS_FAILED_STATUS = 'tests_failed';
    private const CHECK_ERROR_STATUS = 'check_error';

    public function __construct(private int $exitCode, private string $output)
    {
    }

    public function getOutput(): string
    {
        return $this->output;
    }

    public function getResultStatus(): string
    {
        return match ($this->exitCode) {
            self::SUCCESS_EXIT_CODE => self::SUCCESS_STATUS,
            self::FAILED_TESTS_EXIT_CODE => self::TESTS_FAILED_STATUS,
            default => self::CHECK_ERROR_STATUS,
        };
    }

    public function isSuccess(): bool
    {
        return $this->getResultStatus() === self::SUCCESS_STATUS;
    }

    public function toArray()
    {
        return [
            'exit_code' => $this->exitCode,
            'result_status' => $this->getResultStatus(),
            'output' => $this->getOutput(),
        ];
    }
}
