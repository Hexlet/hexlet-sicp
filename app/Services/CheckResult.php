<?php

declare(strict_types=1);

namespace App\Services;

class CheckResult
{
    public const SUCCESS_EXIT_CODE = 0;
    public const FAILED_TESTS_EXIT_CODE = 1;

    private const SUCCESS_STATUS = 'success';
    private const TESTS_FAILED_STATUS = 'tests_failed';
    private const CHECK_EXECUTION_ERROR_STATUS = 'check_error';

    public int $exitCode;
    public string $output;

    public function __construct(int $exitCode, string $output = '')
    {
        $this->exitCode = $exitCode;
        $this->output = $output;
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
            default => self::CHECK_EXECUTION_ERROR_STATUS,
        };
    }

    public function isSuccess(): bool
    {
        return $this->getResultStatus() === self::SUCCESS_STATUS;
    }

    public function isFailedTests(): bool
    {
        return $this->getResultStatus() === self::TESTS_FAILED_STATUS;
    }

    public function isCheckExecutionError(): bool
    {
        return $this->getResultStatus() === self::CHECK_EXECUTION_ERROR_STATUS;
    }

    public function toArray(): array
    {
        return [
            'exit_code' => $this->exitCode,
            'result_status' => $this->getResultStatus(),
            'output' => $this->getOutput(),
        ];
    }
}
