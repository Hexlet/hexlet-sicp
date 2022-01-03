<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Exercise;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Tests\ControllerTestCase;

class ExerciseControllerTest extends ControllerTestCase
{
    private Exercise $exercise;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([
            ChaptersTableSeeder::class,
            ExercisesTableSeeder::class,
        ]);

        $this->exercise = Exercise::first();
    }

    public function testShow(): void
    {
        $route = route('api.exercises.show', [$this->exercise]);

        $response = $this->get($route);
        $response->assertSessionDoesntHaveErrors();
        $response->assertOk();
    }
}
