<?php

namespace Tests\Feature\Http\Controllers\Api\Exercise;

use App\Models\Exercise;
use App\Services\CheckResult;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Tests\ControllerTestCase;
use Tests\TestCase;

class CheckControllerTest extends ControllerTestCase
{
    private Exercise $exercise;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed([
            ChaptersTableSeeder::class,
            ExercisesTableSeeder::class,
        ]);

        $this->actingAs($this->user);
    }

    public function testCheck()
    {
        $exercise = Exercise::wherePath('1.3')->first();
        $path = route('api.exercises.check.store', [$exercise]);

        $underscoredPath = $exercise->present()->underscorePath;
        $solutionCode = view("exercise.solution_stub.{$underscoredPath}_solution")->render();

        $data = [
            'user_id' => $this->user->id,
            'solution_code' => $solutionCode,
        ];
        $response = $this->postJson($path, $data);

        $response->assertCreated();

        $responseBody = $response->decodeResponseJson();

        assert(array_get($responseBody, 'check_result.exit_code') === CheckResult::SUCCESS_EXIT_CODE);

        $this->assertDatabaseHas('activity_log', [
            'causer_id' => $this->user->id,
            'subject_id' => $exercise->id,
            'subject_type' => $exercise::class,
        ]);
        $this->assertDatabaseHas('completed_exercises', [
            'user_id' => $this->user->id,
            'exercise_id' => $exercise->id,
        ]);
    }
}
