<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\CompletedExercise;
use App\Exercise;
use App\User;
use Tests\TestCase;

/**
 * Class UserExerciseControllerTest
 * @package Tests\Feature\Http\Controllers
 * @property User $user
 */
class UserExerciseControllerTest extends TestCase
{
    private User $user;

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

    public function testStore(): void
    {
        $exercise = Exercise::inRandomOrder()->first();
        $exercisePage = route('exercises.show', $exercise);

        $this->from($exercisePage)
            ->actingAs($this->user);

        $response = $this->post(route('users.exercises.store', $this->user), [
            'exercise_id' => $exercise->id,
        ]);

        $response->assertRedirect($exercisePage);
        $response->assertSessionDoesntHaveErrors();

        $this->assertDatabaseHas('completed_exercises', [
            'user_id'     => $this->user->id,
            'exercise_id' => $exercise->id
        ]);
    }

    public function testDestroy(): void
    {
        /** @var CompletedExercise $completedExercise */
        $completedExercise = factory(CompletedExercise::class)->create();

        $exercisePage = route('exercises.show', $completedExercise->exercise_id);

        $this->actingAs($this->user)->from($exercisePage);

        $this->assertDatabaseHas('completed_exercises', [
            'user_id'     => $completedExercise->user_id,
            'exercise_id' => $completedExercise->exercise_id
        ]);

        $response = $this->delete(route('users.exercises.destroy', [
            $completedExercise->user_id,
            $completedExercise->exercise_id
        ]));

        $response->assertRedirect($exercisePage);
        $response->assertSessionDoesntHaveErrors();

        $this->assertDatabaseMissing('completed_exercises', [
            'user_id'     => $completedExercise->user_id,
            'exercise_id' => $completedExercise->exercise_id
        ]);
    }
}
