<?php

namespace App\Http\Controllers;

use App\Activity;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;

class WelcomeController extends Controller
{
    public function index()
    {
        $logItems = Activity::latest()->with('causer')->limit(10)->get();

        $countActivitiesByDays = Activity::all()
            ->groupBy(function (Activity $activity) {
                    return $activity->created_at->format('Y-m-d');
            })
            ->map(function (Collection $group) {
                    return $group->count();
            });

        $chart = CarbonPeriod::create(now()->subMonths(12), '1 day', now())
            ->map(function (Carbon $dayDate) use ($countActivitiesByDays) {
                    $day = $dayDate->format('Y-m-d');
                    $dayActivitiesCount = $countActivitiesByDays->get($day, 0);

                if ($dayActivitiesCount < 1) :
                    return 0;
                elseif ($dayActivitiesCount < 5) :
                    return 1;
                elseif ($dayActivitiesCount < 10) :
                    return 2;
                elseif ($dayActivitiesCount < 15) :
                    return 3;
                else :
                    return 4;
                endif;
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
