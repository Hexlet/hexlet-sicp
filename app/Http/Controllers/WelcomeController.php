<?php

namespace App\Http\Controllers;

use App\Activity;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class WelcomeController extends Controller
{
    public function index()
    {
        $logItems = Activity::latest()->with('causer')->limit(10)->get();

        $countActivitiesByDays = Activity::all()
            ->groupBy(function (Activity $activity) {
                    return $activity->created_at->format('Y-m-d');
            })
            ->map(function ($group) {
                    return $group->count();
            });

        $chart = CarbonPeriod::create(now()->subMonths(12), '1 day', now())
            ->map(function (Carbon $dayDate) use ($countActivitiesByDays) {
                    $day = $dayDate->format('Y-m-d');
                    $dayActivitiesCount = $countActivitiesByDays->get($day, 0);

                    return $dayActivitiesCount;
            });

        return view(
            'welcome',
            [
                'logItems' => $logItems,
                'chart' => $chart,
            ]
        );
    }
}
