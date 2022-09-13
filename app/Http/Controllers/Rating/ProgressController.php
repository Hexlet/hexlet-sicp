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
        $nextChaptersParameterFromSort = RatingHelper::getParameterFromSorting('read_chapters_count', $sortParams);
        $nextExercisesParameterFromSort = RatingHelper::getParameterFromSorting('completed_exercises_count', $sortParams);
        $rating = getCalculatedRating();
        $exercisesCount= Exercise::count();
        return view('rating.progress', compact(
            'rating',
            'exercisesCount',
            'sortParams',
            'nextChaptersParameterFromSort',
            'nextExercisesParameterFromSort',
        ));
    }
}
