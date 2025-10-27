<?php

namespace App\Helpers;

use App\Models\Activity;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;

class ChartHelper
{
    public static function getChart(?int $userId = null): \Generator
    {
        $countActivitiesByDays = Activity::where('causer_id', $userId)
            ->orWhere(function ($query) use ($userId) {
                if (!$userId) {
                    $query->whereNotNull('causer_id');
                }
            })
            ->get()
            ->groupBy(function (Activity $activity) {
                return $activity->created_at->format('Y-m-d');
            })
            ->map(function (Collection $group) {
                return $group->count();
            });

        $chart = CarbonPeriod::create(now()->subMonths(12), '1 day', now())
            ->map(function (Carbon $dayDate) use ($countActivitiesByDays): array {
                $day = $dayDate->format('Y-m-d');
                $dayActivitiesCount = $countActivitiesByDays->get($day, 0);
                $magicNumber = 4;
                $maxDayActivityLevel = 4;
                $dayActivityLevel = (ceil(($dayActivitiesCount) / $magicNumber));

                return [
                    'date' => $day,
                    'count' => $dayActivitiesCount,
                    'level' => (int) min($dayActivityLevel, $maxDayActivityLevel),
                ];
            });

        return $chart;
    }
}
