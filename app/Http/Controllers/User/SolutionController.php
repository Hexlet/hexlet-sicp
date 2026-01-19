<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Models\User;
use Illuminate\View\View;

class SolutionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Solution::class, 'solution');
    }

    public function show(User $user, Solution $solution): View
    {
        $currentExercise = $solution->exercise;

        $solutionsListForCurrentExercise = $solution->exercise
            ->solutions()
            ->where('user_id', $user->id)
            ->get();

        return view('solution.show', compact(
            'currentExercise',
            'solutionsListForCurrentExercise',
            'user'
        ));
    }
}
