<?php

namespace App\Http\Controllers;

use App\Solution;
use App\User;
use App\Exercise;
use Illuminate\Http\Request;

class SolutionController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Solution::class, 'solution');
    }

    public function store(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'content' => 'required|string|min:1'
        ]);

        $exercise = Exercise::findOrFail($request->get('exercise_id'));

        $solution = new Solution($validatedData);
        $solution->user()->associate($user)->exercise()->associate($exercise);


        if ($solution->save()) {
            activity()
            ->performedOn($solution)
            ->causedBy($user)
            ->withProperties([
                'exercise_id' => $exercise->id,
                'exercise_path' => $exercise->path
            ])
            ->log('add_solution');
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return back();
    }

    public function show(User $user, Solution $solution)
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

    public function destroy(User $user, Solution $solution)
    {
        if ($solution->delete()) {
            flash()->success(__('layout.flash.success'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return back();
    }
}
