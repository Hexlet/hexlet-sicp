<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\Comment;
use App\Exercise;
use Tests\TestCase;
use App\User;

class ExerciseControllerTest extends TestCase
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
        $user = factory(User::class)->create();
        $this->actingAs($user);

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
