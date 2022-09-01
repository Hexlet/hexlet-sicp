<?php

namespace App\Http\Controllers\Rating;

use App\Models\Exercise;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProgressController extends Controller
{
    public function index(Request $request): View
    {
        $sortChapters = $request->get('chapters');
        $sortExercises = $request->get('exercises');
        $rating = getCalculatedRating($sortChapters, $sortExercises);
        $amountExercises = Exercise::count();

        return view('rating.progress', compact('rating', 'amountExercises', 'sortExercises', 'sortChapters'));
    }
}
