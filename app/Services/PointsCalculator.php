<?php

namespace App\Services;

class PointsCalculator
{
    public static function calculate(int $readChaptersCount, int $completedExercisesCount): int
    {
        return $readChaptersCount + $completedExercisesCount * 3;
    }
}
