<?php

namespace App\Http\Controllers\Api\Exercise;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Services\ExerciseService;
use Illuminate\Http\Request;
use App\Models\User;

class CheckController extends Controller
{
    public function store(Exercise $exercise, Request $request, ExerciseService $exerciseService)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'solution_code' => 'required'
        ]);

        $user = User::findOrFail($data['user_id']);
        $solutionCode = $data['solution_code'];

        $checkResult = $exerciseService->check($user, $exercise, $solutionCode);

        return response([
            'check_result' => $checkResult->toArray(),
        ], 201);
    }
}
