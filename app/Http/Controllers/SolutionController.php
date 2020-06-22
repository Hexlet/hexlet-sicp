<?php

namespace App\Http\Controllers;

use App\Solution;
use App\User;
use App\Http\Requests\SolutionRequest;

class SolutionController extends Controller
{
    
    public function store(SolutionRequest $request, User $user)
    {
        if (Solution::create($request->validated())) {
            flash()->success(__('layout.flash.success'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return back()->withInput();
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
