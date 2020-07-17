<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Exercise;
use Illuminate\View\View;

class RatingTopProgressController extends Controller
{
    public function index(): View
    {
        $rating = getCalculatedRating();
        $chapters = Chapter::with('children', 'exercises')->get();
        $exercises = Exercise::all();
        return view('rating.progress', compact('rating', 'chapters', 'exercises'));
    }
}
