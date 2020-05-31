<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Exercise;

class RatingTopProgressController extends Controller
{
    public function index()
    {
        $rating = getCalculatedRating();
        $chapters = Chapter::with('children', 'exercises')->get();
        $exercises = Exercise::all();
        return view('rating.progress', compact('rating', 'chapters', 'exercises'));
    }
}
