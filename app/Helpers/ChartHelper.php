<?php

use App\Models\Activity;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;

if (!function_exists('getChart')) {

    /**
     * @param int $userId
     */

    function getChart($userId = null): Generator
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
            ->map(function (Carbon $dayDate) use ($countActivitiesByDays): int {
                $day = $dayDate->format('Y-m-d');
                $dayActivitiesCount = $countActivitiesByDays->get($day, 0);
                $magicNumber = 4;
                $maxDayActivityLevel = 4;
                $dayActivityLevel = (ceil(($dayActivitiesCount) / $magicNumber));

                return (int) min($dayActivityLevel, $maxDayActivityLevel);
            });

        return $chart;
    }
}
