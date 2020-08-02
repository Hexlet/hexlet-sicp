<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class RatingTopController extends Controller
{
    public function index(): View
    {
        $rating = getCalculatedRating();

        return view('rating.index', compact('rating'));
    }
}
