<?php

namespace App\Http\Controllers\Api\Exercise;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Exercise\CheckSolutionRequest;
use App\Http\Resources\Api\Exercise\CheckResultResource;
use App\Models\Exercise;
use App\Models\User;
use App\Services\ExerciseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckController extends Controller
{
    /**
     * Check user or guest solution code
     */
    public function store(
        Exercise $exercise,
        CheckSolutionRequest $request,
        ExerciseService $exerciseService
    ): Response {
        $data = $request->validated();

        $user = array_get($data, 'user_id') !== null ? User::findOrFail($data['user_id']) : new User();

        $solutionCode = $data['solution_code'];

        $checkResult = $exerciseService->check($user, $exercise, $solutionCode);

        return response([
            'check_result' => new CheckResultResource($checkResult),
        ], 201);
    }
}
