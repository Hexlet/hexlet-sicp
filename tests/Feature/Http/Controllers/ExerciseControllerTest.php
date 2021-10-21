<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Comment;
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

        $exercise = Exercise::first();
        $exercise->comments()->saveMany(
            Comment::factory()
                ->count(5)
                ->user($this->user)
                ->commentable($exercise)
                ->make()
        );

        $this->exercise = $exercise;

        $this->actingAs($this->user);
    }

    public function testIndex(): void
    {
        $response = $this->get(route('exercises.index'));
        $response->assertOk();
    }

    public function testShow(): void
    {
        $response = $this->get(route('exercises.show', $this->exercise));
        $response->assertOk();
    }
}
