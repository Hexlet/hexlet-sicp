<?php

namespace App\Http\Controllers;

use App\Solution;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    
    public function store(Request $request)
    {
        $this->authorize(Solution::class);

        $validatedData = $request->validate([
            'exercise_id' => 'required|integer|min:1',
            'user_id' => 'required|integer|min:1',
            'content' => 'required|string|min:1'
        ]);
        Solution::create($validatedData);

        return back()->withInput();
    }

    public function destroy(Solution $solution)
    {
        $this->authorize($solution);

        if ($solution->delete()) {
            flash()->success(__('layout.flash.success'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return back();
    }
}
