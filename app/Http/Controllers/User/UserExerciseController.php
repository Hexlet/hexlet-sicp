<?php

namespace App\Http\Controllers\User;

use App\Models\Exercise;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserExerciseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, User $user): RedirectResponse
    {
        /** @var Exercise $exercise */
        $exercise = Exercise::findOrFail($request->get('exercise_id'));

        $this->completeExercise($user, $exercise);

        return redirect()->back();
    }

    public function update(User $user, Exercise $exercise): RedirectResponse
    {
        $this->completeExercise($user, $exercise);

        return redirect()->back();
    }

    public function destroy(User $user, Exercise $exercise): RedirectResponse
    {
        $user->exercises()->detach($exercise);

        activity()
            ->performedOn($exercise)
            ->causedBy($user)
            ->withProperties(
                ['exercise_id' => $exercise->id]
            )
            ->log('destroy_exercise');

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
