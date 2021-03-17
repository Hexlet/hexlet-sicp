<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Comment;
use App\Models\Exercise;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Illuminate\Testing\TestResponse;
use Tests\ControllerTestCase;

class ExerciseControllerTest extends ControllerTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([
            ChaptersTableSeeder::class,
            ExercisesTableSeeder::class,
        ]);
    }

    public function testIndex(): void
    {
        $this->actingAs($this->user);

        $response = $this->get(route('exercises.index'));
        $exercise = Exercise::inRandomOrder()->first();

        $response->assertOk();
        $response->assertSee($exercise->path);
    }

    public function testShow(): void
    {
        $exercise = Exercise::inRandomOrder()->first();
        $exercise->comments()->saveMany(
            Comment::factory()
                ->count(5)
                ->user($this->user)
                ->commentable($exercise)
                ->make()
        );

        $response = $this->get(route('exercises.show', $exercise));

        $response->assertOk();
        $response->assertSee($exercise->path);
        $response->assertSeeLivewire('exercise-editor');
    }
}
