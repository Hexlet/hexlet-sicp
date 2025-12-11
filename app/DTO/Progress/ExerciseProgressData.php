<?php

namespace App\DTO\Progress;

use App\Models\Exercise;
use App\Models\ExerciseMember;

readonly class ExerciseProgressData
{
    public function __construct(
        public Exercise $exercise,
        public ?ExerciseMember $exerciseMember = null,
    ) {
    }

    public function isCompleted(): bool
    {
        return $this->exerciseMember?->isFinished() ?? false;
    }

    public function isStarted(): bool
    {
        return $this->exerciseMember?->isStarted() ?? false;
    }

    public function isInProgress(): bool
    {
        return $this->isStarted() && !$this->isCompleted();
    }

    public function isNotStarted(): bool
    {
        return $this->exerciseMember === null;
    }
}
