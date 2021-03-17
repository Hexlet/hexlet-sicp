<?php

namespace App\Http\Controllers\User;

use App\Models\Exercise;
use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Models\User;
use App\Services\ActivityService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SolutionController extends Controller
{
    private ActivityService $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->authorizeResource(Solution::class, 'solution');
        $this->activityService = $activityService;
    }

    public function store(Request $request, User $user): RedirectResponse
    {
        $validatedData = $request->validate([
            'content' => 'required|string|min:1',
        ]);

        $exercise = Exercise::findOrFail($request->get('exercise_id'));
        $solution = new Solution($validatedData);

        $solution = $solution->user()->associate($user);
        $solution = $solution->exercise()->associate($exercise);
        $solution->save();

        flash()->success(__('layout.flash.success'));
        $this->activityService->logAddedSolution($user, $solution);

        return back();
    }

    public function show(User $user, Solution $solution): View
    {

        $currentExercise = $solution->exercise;

        $solutionsListForCurrentExercise = $solution->exercise
        ->solutions()
        ->where('user_id', $user->id)
        ->get();

        return view('solution.show', compact(
            'currentExercise',
            'solutionsListForCurrentExercise',
            'user'
        ));
    }

    public function destroy(User $user, Solution $solution): RedirectResponse
    {
        if ($solution->delete()) {
            flash()->success(__('layout.flash.success'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return back();
    }
}
