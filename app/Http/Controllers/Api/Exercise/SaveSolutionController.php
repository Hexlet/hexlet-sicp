<?php

namespace App\Http\Controllers\Api\Exercise;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\Solution;
use App\Models\User;
use App\Services\ExerciseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SaveSolutionController extends Controller
{
    public function store(Exercise $exercise, Request $request, ExerciseService $exerciseService): Response
    {
        $data = $request->validate([
            'user_id' => 'required',
            'solution_code' => 'required',
        ]);

        $user = User::findOrFail($data['user_id']);

        $solutionCode = $data['solution_code'];

        $solution = $exerciseService->createSolution($user, $exercise, $solutionCode);

        return response([
            'save_result' => $solution->toArray(),
        ], 201);
    }
}
