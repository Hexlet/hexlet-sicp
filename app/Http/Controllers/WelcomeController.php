<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Chapter;
use App\Comment;
use App\Exercise;
use App\User;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function index(): View
    {

        if (auth()->guest()) {
            $countComments = Comment::count();
            $countExercises = Exercise::count();
            $countChapters = Chapter::count();
            $countUsers = User::count();

            return view('land_new', compact(
                'countComments',
                'countExercises',
                'countChapters',
                'countUsers'
            ));
        }

        $logItems = Activity::latest()->with('causer')->limit(10)->get();
        $chart = getChart();
        $comments = Comment::latest()->limit(10)->get();

        return view('welcome', compact(
            'logItems',
            'chart',
            'comments'
        ));
    }
}
