<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AboutController extends Controller
{

    public function show(): View
    {
        return view('pages.about', compact([]));
    }
}
