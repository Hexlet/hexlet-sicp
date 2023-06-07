<?php

namespace Tests\Feature\Http\Controllers\Api\Exercise;

use App\Models\Exercise;
use App\Models\Solution;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Database\Seeders\SolutionsTableSeeder;
use Tests\ControllerTestCase;

class SolutionControllerTest extends ControllerTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->seed([
            ChaptersTableSeeder::class,
            ExercisesTableSeeder::class,
            SolutionsTableSeeder::class,
        ]);

        $this->actingAs($this->user);
    }

    public function testStore(): void
    {
        $exercise = Exercise::wherePath('1.3')->first();
        $path = route('api.exercises.solutions.store', [$exercise]);

        $underscoredPath = $exercise->present()->underscorePath;
        $solutionCode = view("exercise.solution_stub.{$underscoredPath}_solution")->render();

        $data = [
            'user_id' => $this->user->id,
            'solution_code' => $solutionCode,
        ];
        $response = $this->postJson($path, $data);

        $response->assertCreated();

        $this->assertDatabaseHas('activity_log', [
            'causer_id' => $this->user->id,
            'subject_type' => Solution::class,
        ]);
        $this->assertDatabaseHas('solutions', [
            'user_id' => $this->user->id,
            'exercise_id' => $exercise->id,
        ]);
    }
}
