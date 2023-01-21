<?php

namespace App\Http\Controllers;

use App\Models\ExerciseMember;
use App\Models\Exercise;
use App\Models\User;
use Illuminate\View\View;

class ExerciseController extends Controller
{
    public function index(): View
    {
        $exercisesGroups = Exercise::orderBy('id')->get()
            ->groupBy(function (Exercise $exercise) {
                return substr($exercise->path, 0, 1);
            });
        return view('exercise.index', compact('exercisesGroups'));
    }

    public function show(Exercise $exercise): View
    {
        $exercise->load('chapter', 'users');
        /** @var User $authUser */
        $authUser = auth()->user() ?? new User();
        $userCompletedExercise = $authUser->exerciseMembers()
            ->where('exercise_id', $exercise->id)
            ->exists();

        $previousExercise = Exercise::whereId($exercise->id - 1)->firstOrNew([]);
        $nextExercise = Exercise::whereId($exercise->id + 1)->firstOrNew([]);

        $userSolutions = $authUser->solutions()
            ->where('exercise_id', $exercise->id)
            ->get();

        $isShowSavedSolutionsButton = collect($userSolutions)->isEmpty();
        /** @var ExerciseMember $completedExercise */
        $completedExercise = $authUser
            ->exerciseMembers()
            ->whereBelongsTo($exercise)->firstOrNew([]);

        if (
            $authUser->isRegistered() &&
            $completedExercise->isNotFinished()
        ) {
            $completedExercise->user()->associate($authUser);
            $completedExercise->exercise()->associate($exercise);
            $completedExercise->save();
        }

        return view('exercise.show', compact(
            'exercise',
            'userCompletedExercise',
            'authUser',
            'previousExercise',
            'nextExercise',
            'isShowSavedSolutionsButton'
        ));
    }
}
