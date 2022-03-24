<?php

namespace App\Http\Controllers\Api\Exercise;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\User;
use App\Services\ExerciseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckController extends Controller
{
    public function store(Exercise $exercise, Request $request, ExerciseService $exerciseService): Response
    {
        $data = $request->validate([
            'user_id' => 'nullable',
            'solution_code' => 'required',
        ]);

        $user = $data['user_id'] !== null ? User::findOrFail($data['user_id']) : new User();

        $solutionCode = $data['solution_code'];

        $checkResult = $exerciseService->check($user, $exercise, $solutionCode);

        return response([
            'check_result' => $checkResult->toArray(),
        ], 201);
    }
}
