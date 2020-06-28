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
            'exercise_id' => 'required|integer|min:1',
            'content' => 'required|string|min:1'
        ]);

        $solution = new Solution($validatedData);
        $solution->user()->associate($user);
        $exercise = Exercise::findOrFail($request->get('exercise_id'));

        if ($solution->save()) {
            activity()
            ->performedOn($solution)
            ->causedBy($user)
            ->withProperties([
                'exercise_id' => $exercise->id,
                'exercise_path' => $exercise->path
            ])
            ->log('add_solution');
        }
        else {
            flash()->error(__('layout.flash.error'));
        }

        return back();
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
