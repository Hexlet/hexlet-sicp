<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\Chapter;
use App\Models\CompletedExercise;
use App\Models\Exercise;
use Tests\ControllerTestCase;

class UserExerciseControllerTest extends ControllerTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs($this->user);
        factory(Chapter::class, 2)
            ->create()
            ->each(function (Chapter $chapter): void {
                $chapter->exercises()->saveMany(
                    factory(Exercise::class, random_int(1, 3))->make()
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
            'exercise_id' => $exercise->id,
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
            'exercise_id' => $completedExercise->exercise_id,
        ]);

        $response = $this->delete(route('users.exercises.destroy', [
            $completedExercise->user_id,
            $completedExercise->exercise_id,
        ]));

        $response->assertRedirect($exercisePage);
        $response->assertSessionDoesntHaveErrors();

        $this->assertDatabaseMissing('completed_exercises', [
            'user_id'     => $completedExercise->user_id,
            'exercise_id' => $completedExercise->exercise_id,
        ]);
    }
}
