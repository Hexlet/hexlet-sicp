<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\ExerciseMember;
use App\Models\Exercise;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Tests\ControllerTestCase;

class UserExerciseControllerTest extends ControllerTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed([
            ChaptersTableSeeder::class,
            ExercisesTableSeeder::class,
        ]);

        $this->user->exercises()->save(
            Exercise::where(['path' => '1.1'])->firstOrFail(),
        );

        $this->actingAs($this->user);
    }

    public function testStore(): void
    {
        $exercise = Exercise::where(['path' => '2.1'])->firstOrFail();

        $response = $this->post(route('users.exercises.store', $this->user), [
            'exercise_id' => $exercise->id,
        ]);

        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('exercise_members', [
            'user_id'     => $this->user->id,
            'exercise_id' => $exercise->id,
        ]);
    }

    public function testDestroy(): void
    {
        /** @var ExerciseMember $completedExercise */
        $completedExercise = $this->user->exerciseMembers()->firstOrFail();

        $response = $this->delete(route('users.exercises.destroy', [
            $completedExercise->user_id,
            $completedExercise->exercise_id,
        ]));

        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('exercise_members', [
            'user_id'     => $completedExercise->user_id,
            'exercise_id' => $completedExercise->exercise_id,
        ]);
    }
}
