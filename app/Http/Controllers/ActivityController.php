<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function index(): View
    {
        $logItems = Activity::with('causer')
            ->orderBy('created_at', 'DESC')
            ->paginate(15);

        return view('log.index', compact('logItems'));
    }
}
