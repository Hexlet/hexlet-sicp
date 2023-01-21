<?php

namespace App\Services;

class PointsCalculator
{
    public static function calculate(int $readChaptersCount, int $exerciseMembersCount): int
    {
        return $readChaptersCount + $exerciseMembersCount * 3;
    }
}
