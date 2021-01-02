<?php

namespace App\Http\Controllers\Rating;

use App\Models\Chapter;
use App\Models\Exercise;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ProgressController extends Controller
{
    public function index(): View
    {
        $rating = getCalculatedRating();
        $chapters = Chapter::with('children', 'exercises')->get();
        $exercises = Exercise::all();
        return view('rating.progress', compact('rating', 'chapters', 'exercises'));
    }
}
