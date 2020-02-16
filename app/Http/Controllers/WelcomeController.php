<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;

class WelcomeController extends Controller
{
    public function index()
    {
        $logItems = Activity::latest()->with('causer')->limit(10)->get();
        return view('welcome', compact('logItems'));
    }
}
