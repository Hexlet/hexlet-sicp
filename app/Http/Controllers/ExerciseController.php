<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\User;
use App\Solution;

class ExerciseController extends Controller
{
    public function index()
    {
        $exercisesGroups = Exercise::all()
            ->groupBy(function (Exercise $exercise) {
                return substr($exercise->path, 0, 1);
            });
        return view('exercise.index', compact('exercisesGroups'));
    }

    public function show(Exercise $exercise)
    {
        $exercise->load('chapter', 'users');
        $authUser = auth()->user() ?? User::make([]);
        $userCompletedExercise = $authUser->completedExercises()
            ->where('exercise_id', $exercise->id)
            ->exists();

        $previousExercise = Exercise::whereId($exercise->id - 1)->firstOrNew([]);
        $nextExercise = Exercise::whereId($exercise->id + 1)->firstOrNew([]);

        $solutions = Solution::where('user_id', $authUser->id)
            ->where('exercise_id', $exercise->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('exercise.show', compact(
            'exercise',
            'userCompletedExercise',
            'authUser',
            'previousExercise',
            'nextExercise',
            'solutions'
        ));
    }
}
