<?php

namespace App\Http\Controllers\User;

use App\Models\Exercise;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ActivityService;
use App\Services\ExerciseService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserExerciseController extends Controller
{
    private ActivityService $activityService;
    private ExerciseService $exerciseService;

    public function __construct(ActivityService $activityService, ExerciseService $exerciseService)
    {
        $this->middleware('auth');
        $this->activityService = $activityService;
        $this->exerciseService = $exerciseService;
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

    // TODO: remove me запретить удалять пройденные упражнения
    public function destroy(User $user, Exercise $exercise): RedirectResponse
    {
        $this->exerciseService->removeCompletedExercise($user, $exercise);

        flash()->success(__('layout.flash.success'));

        return redirect()->back();
    }

    private function completeExercise(User $user, Exercise $exercise): void
    {
        $this->exerciseService->completeExercise($user, $exercise);
        flash()->success(__('layout.flash.success'));
    }
}
