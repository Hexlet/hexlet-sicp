<?php

namespace App\Http\Controllers\Api\Exercise;

use App\DTO\Api\SaveSolutionData;
use App\Http\Controllers\Controller;
use App\Models\Exercise;
use App\Models\User;
use App\Services\ExerciseService;
use Illuminate\Http\Response;

class SolutionController extends Controller
{
    /**
     * Save user solution
     */
    public function store(
        Exercise $exercise,
        SaveSolutionData $data,
        ExerciseService $exerciseService
    ): Response {
        $user = User::findOrFail($data->user_id);

        $solution = $exerciseService->createSolution($user, $exercise, $data->solution_code);

        return response([
            'save_result' => [
                'id' => (int) $solution->id,
            ],
        ], 201);
    }
}
