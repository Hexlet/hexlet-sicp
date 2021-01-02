<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\View\View;

class SolutionController extends Controller
{
    public function index(): View
    {
        $solutions = QueryBuilder::for(Solution::versioned())
            ->allowedFilters([
                AllowedFilter::exact('exercise_id'),
            ])
            ->whereHas('user')
            ->latest()
            ->paginate(50);
        return view('solution.index', ['solutions' => $solutions]);
    }

    public function show(Solution $solution): View
    {
        $exercise = $solution->exercise;
        $user = $solution->user;
        $solutionsListForCurrentExercise = $solution->exercise
            ->solutions()
            ->where('user_id', $user->id)
            ->get();

        return view('solution.show', [
            'solutionsListForCurrentExercise' => $solutionsListForCurrentExercise,
            'solution' => $solution,
            'currentExercise' => $exercise,
            'user' => $user,
        ]);
    }
}
