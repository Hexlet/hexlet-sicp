<?php

namespace App\Http\Controllers\My;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\View\View;

class SolutionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        /** @var User $user */
        $user = Auth::user();
        $user->load('exerciseMembers');

        $exerciseMembers = $user->exerciseMembers->keyBy('exercise_id');
        $savedSolutionsExercises = $user->solutions()
            ->versioned()
            ->with([
                'exercise',
                'exercise.chapter',
            ])
            ->paginate(10);

        return view('my.solutions', compact(
            'user',
            'exerciseMembers',
            'savedSolutionsExercises'
        ));
    }
}
