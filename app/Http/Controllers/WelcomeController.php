<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Comment;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function index(): View
    {
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
