<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\Solution;
use App\Models\User;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Tests\ControllerTestCase;

class SolutionControllerTest extends ControllerTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->seed([
            ChaptersTableSeeder::class,
            ExercisesTableSeeder::class,
        ]);

        $this->user->solutions()->saveMany(
            Solution::factory()->count(5)->make()
        );

        $this->actingAs($this->user);
    }

    public function testStore(): void
    {
        $solutionParams = Solution::factory()->make([
            'user_id' => $this->user->id,
        ])->only('exercise_id', 'user_id', 'content');

        $response = $this->post(route('users.solutions.store', $this->user), $solutionParams);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('solutions', $solutionParams);
    }

    public function testShow(): void
    {
        $solution = $this->user->solutions()->first();

        $response = $this->get(route('users.solutions.show', [$this->user, $solution]));
        $response->assertOk();
    }

    public function testDestroy(): void
    {
        $solution = $this->user->solutions()->first();

        $response = $this->delete(route('users.solutions.destroy', [$this->user, $solution]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('solutions', $solution->toArray());
    }

    public function testShowDisplaysOtherUsersSolutions(): void
    {
        $solution = $this->user->solutions()->first();
        $exercise = $solution->exercise;

        $otherUser = User::factory()->create();

        $otherSolutions = Solution::factory()->count(2)->create([
            'user_id' => $otherUser->id,
            'exercise_id' => $exercise->id,
        ]);

        $route = route('users.solutions.show', [$this->user, $solution]);

        $response = $this->get($route);
        $response->assertOk();

        $response->assertViewHas('solutionsListForCurrentExercise');
        $response->assertViewHas('solutionsOfOtherUsers');

        $response->assertViewHas('solutionsListForCurrentExercise', function ($solutions) use ($solution) {
            return $solutions->contains('id', $solution->id);
        });

        $response->assertViewHas('solutionsOfOtherUsers', function ($solutions) use ($otherSolutions) {
            $solutionIds = $solutions->pluck('id')->sort()->values()->all();
            $otherSolutionIds = $otherSolutions->pluck('id')->sort()->values()->all();

            return $solutionIds === $otherSolutionIds;
        });
    }
}
