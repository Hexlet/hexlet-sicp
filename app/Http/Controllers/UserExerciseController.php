<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\User;
use Illuminate\Http\Request;

class UserExerciseController extends Controller
{
    public function store(Request $request, User $user)
    {
        $exercise = Exercise::findOrFail($request->get('exercise_id'));

        $user->exercises()->syncWithoutDetaching($exercise);

        activity()
            ->performedOn($exercise)
            ->causedBy($user)
            ->withProperties(
                ['exercise_id' => $exercise->id]
            )
            ->log('completed_exercise');

        flash()->success(__('layout.flash.success'));

        return redirect()->back();
    }
}
