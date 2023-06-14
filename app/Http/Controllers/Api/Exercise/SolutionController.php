<?php

namespace App\Http\Controllers\Api\Exercise;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\User;
use App\Services\ExerciseService;
use Illuminate\Http\Response;
use App\Http\Requests\Api\Exercise\SaveSolutionRequest;

class SolutionController extends Controller
{
    /**
     * Save user solution
     */
    public function store(
        Exercise $exercise,
        SaveSolutionRequest $request,
        ExerciseService $exerciseService
    ): Response {
        $data = $request->validated();

        $user = User::findOrFail($data['user_id']);

        $solutionCode = $data['solution_code'];

        $solutionResult = $exerciseService->createSolution($user, $exercise, $solutionCode);

        return response([
            'save_result' => [
                'id' => (int)$solutionResult->id,
            ],
        ], 201);
    }
}
