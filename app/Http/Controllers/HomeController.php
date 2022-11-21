<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {

        if (auth()->guest()) {
            $countComments = Comment::count();
            $countExercises = Exercise::count();
            $countChapters = Chapter::count();
            $countUsers = User::count();

            return view('home.landing', compact(
                'countComments',
                'countExercises',
                'countChapters',
                'countUsers'
            ));
        }

        $statisticTable = $this->getStatisticTable();
        $logItems = Activity::latest()->has('causer')->with('causer')->limit(10)->get();
        $chart = getChart();
        $comments = Comment::latest()->has('user')->with('user')->with('commentable')->limit(10)->get();

        return view('home.index', compact(
            'logItems',
            'chart',
            'comments',
            'statisticTable',
        ));
    }

    private function getStatisticTable(): array
    {
        $query = $_GET['filter'] ?? '';
        $periodsForQuery = ['week', 'month'];

        if (!in_array($query, $periodsForQuery, true)) {
            $countChapters = Chapter::all()->count();
            $countExercises = Exercise::all()->count();
        } else {
            $subPeriod = 'sub' . $query;
            $period = Carbon::today()->$subPeriod(1);

            $countChapters = Chapter::where('created_at', '>', $period)->count();
            $countExercises = Exercise::where('created_at', '>', $period)->count();
        }

        return [
            'countChapters' => $countChapters,
            'countExercises' => $countExercises,
            'countPoints' => $countChapters + $countExercises * 3,
        ];
    }
}
