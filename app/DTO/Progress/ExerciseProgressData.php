<?php

namespace App\DTO\Progress;

use App\Models\Exercise;

readonly class ExerciseProgressData
{
    public function __construct(
        public Exercise $exercise,
        public bool $isCompleted,
        public bool $isStarted,
    ) {
    }

    public function isInProgress(): bool
    {
        return !$this->isCompleted && $this->isStarted;
    }

    public function isNotStarted(): bool
    {
        return !$this->isCompleted && !$this->isStarted;
    }
}
