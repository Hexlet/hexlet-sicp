<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Comment;
use App\Chapter;
use App\Exercise;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;

class WelcomeController extends Controller
{
    public function index()
    {
        $logItems = Activity::latest()->with('causer')->limit(10)->get();
        $chart = $this->getChart();
        $comments = Comment::latest()->limit(10)->get();
        $countChapters = Chapter::count();
        $countExercises = Exercise::count();
        $countUsers = User::count();
        $countComments = Comment::count();

        return view('welcome', compact(
            'logItems',
            'chart',
            'comments',
            'countChapters',
            'countExercises',
            'countUsers',
            'countComments'
        ));
    }

    /**
     * @return \Generator
     */
    private function getChart(): \Generator
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

                return min($dayActivityLevel, $maxDayActivityLevel);
            });

        return $chart;
    }
}
