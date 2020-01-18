<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
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
            ->each(function (Chapter $chapter) {
                $chapter->exercises()->saveMany(
                    factory(Exercise::class, mt_rand(1, 3))->make()
                );
            });
    }

    public function testIndexAsGuest()
    {
        $response = $this->get(route('exercises.index'));
        $exercise = Exercise::inRandomOrder()->first();

        $response->assertStatus(200);
        $response->assertSee($exercise->path);
    }

    public function testIndexAsUser()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->get(route('exercises.index'));
        $exercise = Exercise::inRandomOrder()->first();

        $response->assertStatus(200);
        $response->assertSee($exercise->path);
    }

    public function testShow()
    {
        $exercise = Exercise::inRandomOrder()->first();
        $response = $this->get(route('exercises.show', $exercise));

        $response->assertStatus(200);
        $response->assertSee($exercise->path);
    }
}
