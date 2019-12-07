<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class WelcomeController extends Controller
{
    public function index()
    {
        $logItems = Activity::orderBy('created_at', 'DESC')->limit(10)->get();
        return view('welcome', compact('logItems'));
    }
}
