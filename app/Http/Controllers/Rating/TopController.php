<?php

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\Controller;
use App\Services\RatingCalculator;
use Illuminate\View\View;

class TopController extends Controller
{
    public function index(RatingCalculator $ratingCalculator): View
    {
        $rating = $ratingCalculator->calculate();

        return view('rating.top', compact('rating'));
    }
}
