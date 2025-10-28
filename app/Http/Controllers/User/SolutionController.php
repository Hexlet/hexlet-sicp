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
//        $this->authorizeResource(Solution::class, 'solution', [
//            'except' => ['show'],
//        ]);
        $this->activityService = $activityService;
    }

    public function store(Request $request, User $user): RedirectResponse
    {
        $this->authorize('create', Solution::class);

        $validatedData = $request->validate([
            'content' => 'required|string|min:1',
        ]);

        $exercise = Exercise::findOrFail($request->get('exercise_id'));


        $solution = new Solution($validatedData);

        $solution->user()->associate($user);
        $solution->exercise()->associate($exercise);

        $solution->save();

        flash()->success(__('layout.flash.success'));
        $this->activityService->logAddedSolution($user, $solution);

        return back();
    }

    public function show(User $user, Solution $solution): View
    {
        $currentExercise = $solution->exercise;

        $solutionsOfCurrentUser = $solution->exercise
        ->solutions()
        ->where('user_id', $user->id)
        ->get();

        $solutionsOfOtherUsers = $solution->exercise
            ->solutions()
            ->whereNot('user_id', $user->id)
            ->get();

        return view('user.solution.show', compact(
            'currentExercise',
            'solutionsOfCurrentUser',
            'solutionsOfOtherUsers',
            'user',
        ));
    }

    public function destroy(User $user, Solution $solution): RedirectResponse
    {
        $this->authorize('delete', $solution);

        if ($solution->delete()) {
            flash()->success(__('layout.flash.success'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return back();
    }
}
