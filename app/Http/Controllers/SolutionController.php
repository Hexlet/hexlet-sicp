<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\View\View;

class SolutionController extends Controller
{
    public function index(Request $request): View
    {
        $filter = $request->input('filter', ['user_id' => 0, 'exercise_id' => 0]);

        $solutions = QueryBuilder::for(Solution::versioned())
            ->allowedFilters([
                AllowedFilter::exact('exercise_id'),
                AllowedFilter::exact('user_id'),
            ])
            ->whereHas('user')
            ->latest()
            ->paginate(50);

        $exerciseTitles = $solutions
            ->mapWithKeys(fn($solution) => [$solution->exercise->id => getFullExerciseTitle($solution->exercise)]);

        $solutionAuthors = [];
        if (Auth::user()) {
            $solutionAuthors = [Auth::user()->id => Auth::user()->name];
        }

        return view(
            'solution.index',
            [
                'solutions' => $solutions,
                'filter'    => $filter,
                'exerciseTitles'  => $exerciseTitles,
                'solutionAuthors' => $solutionAuthors,
            ]
        );
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
