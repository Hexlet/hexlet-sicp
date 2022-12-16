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
        $hasTests = $exercise->hasTests();
        $testCode = $hasTests
            ? $exercise->getExerciseTests()
            : '';
        $originalCode = $hasTests
            ? view(ExerciseHelper::getExerciseListingViewFilepath($exercise))->render()
            : '';
        $hasTeacherSolution = $exercise->hasTeacherSolution();
        $teacherSolutionCode = $hasTeacherSolution
            ? $exercise->getExerciseTeacherSolution()
            : '';

        return response([
            'exercise' => [
                'id' => $exercise->id,
                'prepared_code' => '',
                'original_code' => $originalCode,
                'test_code' => $testCode,
                'has_tests' => $hasTests,
                'has_teacher_solution' => $hasTeacherSolution,
                'teacher_solution_code' => $teacherSolutionCode,
            ],
        ]);
    }
}
