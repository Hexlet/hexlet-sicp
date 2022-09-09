<?php

namespace App\Http\Controllers\Rating;

use App\Helpers\RatingHelper;
use App\Models\Exercise;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProgressController extends Controller
{
    public function index(Request $request): View
    {
        $sortParams = $request->get('sort');
        $nextChaptersParameterFromSort = RatingHelper::getStateSort('read_chapters_count', $sortParams ?? 'default');
        $nextExercisesParameterFromSort = RatingHelper::getStateSort('completed_exercises_count', $sortParams ?? 'default');
        $rating = getCalculatedRating();
        $amountExercises = Exercise::count();
        return view('rating.progress', compact(
            'rating',
            'amountExercises',
            'sortParams',
            'nextChaptersParameterFromSort',
            'nextExercisesParameterFromSort',
        ));
    }
}
