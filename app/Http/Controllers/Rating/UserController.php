<?php

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $rating = getCalculatedRating();

        return view('rating.index', compact('rating'));
    }
}
