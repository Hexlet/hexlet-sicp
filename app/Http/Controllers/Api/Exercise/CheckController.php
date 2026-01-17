<?php

namespace App\Http\Controllers\Api\Exercise;

use App\DTO\Api\CheckSolutionData;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Exercise\CheckResultResource;
use App\Models\Exercise;
use App\Models\User;
use App\Services\ExerciseService;
use Illuminate\Http\Response;

class CheckController extends Controller
{
    /**
     * Check user or guest solution code
     */
    public function store(
        Exercise $exercise,
        CheckSolutionData $data,
        ExerciseService $exerciseService
    ): Response {
        $user = $data->user_id !== null
            ? User::findOrFail($data->user_id)
            : new User();

        $checkResult = $exerciseService->check($user, $exercise, $data->solution_code);

        return response([
            'check_result' => new CheckResultResource($checkResult),
        ], 201);
    }
}
