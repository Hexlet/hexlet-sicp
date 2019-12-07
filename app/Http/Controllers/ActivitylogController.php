<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\Paginator;
use Spatie\Activitylog\Models\Activity;

class ActivitylogController extends Controller
{
    public function index()
    {
        $logItems = Activity::with('causer')
            ->orderBy('created_at', 'DESC')
            ->paginate(15);
        return view('log.index', compact('logItems'));
    }
}
