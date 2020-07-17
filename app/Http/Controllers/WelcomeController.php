<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Comment;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Generator;
use Illuminate\Support\Collection;
use Illuminate\View\Factory;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function index(): View
    {
        $logItems = Activity::latest()->with('causer')->limit(10)->get();
        $chart = $this->getChart();
        $comments = Comment::latest()->limit(10)->get();

        return view('welcome', compact(
            'logItems',
            'chart',
            'comments'
        ));
    }

    private function getChart(): Generator
    {
        $countActivitiesByDays = Activity::all()
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

                return (int)min($dayActivityLevel, $maxDayActivityLevel);
            });

        return $chart;
    }
}
