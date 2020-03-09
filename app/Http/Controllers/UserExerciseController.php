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

        $this->completeChapter($user, $exercise);

        return redirect()->back();
    }

    public function update(Request $request, User $user, Exercise $exercise)
    {
        $this->completeChapter($user, $exercise);

        return redirect()->back();
    }

    /**
     * @param User $user
     * @param $exercise
     */
    private function completeChapter(User $user, Exercise $exercise): void
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
