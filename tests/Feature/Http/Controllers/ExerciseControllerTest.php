<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Exercise;
use Tests\ControllerTestCase;

class ExerciseControllerTest extends ControllerTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        factory(Chapter::class, 2)
            ->create()
            ->each(function (Chapter $chapter): void {
                $chapter->exercises()->saveMany(
                    factory(Exercise::class, mt_rand(1, 3))->make()
                );
            });
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
            factory(Comment::class, 5)->state('with_user')->make()
        );

        $response = $this->get(route('exercises.show', $exercise));

        $response->assertOk();
        $response->assertSee($exercise->path);
    }
}
