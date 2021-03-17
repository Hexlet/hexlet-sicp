<?php

namespace App\Http\Controllers\User;

use App\Models\Exercise;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ActivityService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserExerciseController extends Controller
{
    private ActivityService $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->middleware('auth');
        $this->activityService = $activityService;
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
        $this->activityService->logRemovedExercise($user, $exercise);

        flash()->success(__('layout.flash.success'));

        return redirect()->back();
    }

    private function completeExercise(User $user, Exercise $exercise): void
    {
        $user->exercises()->syncWithoutDetaching($exercise);
        $this->activityService->logCompletedExercise($user, $exercise);
        flash()->success(__('layout.flash.success'));
    }
}
