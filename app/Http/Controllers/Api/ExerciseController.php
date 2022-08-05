<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ExerciseHelper;
use App\Models\Exercise;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ExerciseController extends Controller
{
    public function show(Exercise $exercise): Response
    {
        $hasTests = ExerciseHelper::exerciseHasTests($exercise);
        $testCode = $hasTests
            ? ExerciseHelper::getExerciseTests($exercise)
            : '';
        $originalCode = $hasTests
            ? view(ExerciseHelper::getExerciseListingViewFilepath($exercise))->render()
            : '';
        $hasSolution = ExerciseHelper::exerciseHasSolution($exercise);
        $solutionCode = $hasSolution
            ? ExerciseHelper::getExerciseSolution($exercise)
            : '';

        return response([
            'exercise' => [
                'id' => $exercise->id,
                'prepared_code' => '',
                'original_code' => $originalCode,
                'test_code' => $testCode,
                'has_tests' => $hasTests,
                'has_solution' => $hasSolution,
                'solution_code' => $solutionCode,
            ],
        ]);
    }
}
