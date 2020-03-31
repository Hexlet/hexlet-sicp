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

        $this->completeExercise($user, $exercise);

        return redirect()->back();
    }

    public function update(User $user, Exercise $exercise)
    {
        $this->completeExercise($user, $exercise);

        return redirect()->back();
    }

    public function destroy(User $user, Exercise $exercise)
    {
        $user->exercises()->detach($exercise);

        flash()->success(__('layout.flash.success'));
        return redirect()->back();
    }

    private function completeExercise(User $user, Exercise $exercise): void
    {
        $user->exercises()->syncWithoutDetaching($exercise);

        activity()
            ->performedOn($exercise)
            ->causedBy($user)
            ->withProperties(
                ['exercise_id' => $exercise->id]
            )
            ->log('completed_exercise');

        flash()->success(__('layout.flash.success'));
    }
}
