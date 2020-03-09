<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\User;

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
        /** @var User $user */
        $exercise->load('chapter', 'users');
        $user = auth()->user() ?? User::make([]);
        $userCompletedExercise = $user->completedExercises()
            ->where('exercise_id', $exercise->id)
            ->exists();

        return view('exercise.show', compact('exercise', 'userCompletedExercise'));
    }
}
