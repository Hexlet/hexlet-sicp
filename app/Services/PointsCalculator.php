<?php

namespace App\Services;

class PointsCalculator
{
    public static function calculate(int $chapterMembersCount, int $exerciseMembersCount): int
    {
        return $chapterMembersCount + $exerciseMembersCount * 3;
    }
}
