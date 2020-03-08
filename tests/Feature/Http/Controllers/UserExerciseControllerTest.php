<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\Exercise;
use App\User;
use Tests\TestCase;

class UserExerciseControllerTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
        factory(Chapter::class, 2)
            ->create()
            ->each(function (Chapter $chapter) {
                $chapter->exercises()->saveMany(
                    factory(Exercise::class, mt_rand(1, 3))->make()
                );
            });
    }

    public function testStore()
    {
        $exercise = Exercise::inRandomOrder()->first();
        $exercisePage = route('exercises.show', $exercise);

        $this->from($exercisePage)
            ->actingAs($this->user);

        $this->post(route('users.exercises.store', $this->user), [
                'exercise_id' => $exercise->id,
            ])
            ->assertRedirect($exercisePage);

        $this->assertDatabaseHas('completed_exercises', [
            'user_id'     => $this->user->id,
            'exercise_id' => $exercise->id
        ]);
    }


}
