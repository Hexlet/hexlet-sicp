<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Exercise;
use App\Models\Solution;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\ControllerTestCase;

class SolutionControllerTest extends ControllerTestCase
{
    private Exercise $exercise;
    private Solution $solution;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed([
            ChaptersTableSeeder::class,
            ExercisesTableSeeder::class,
        ]);
        $solutions = Solution::factory()->count(5)->create();
        $this->user->solutions()->saveMany($solutions);

        $this->exercise = Exercise::first();
        $this->solution = Solution::first();

        $this->actingAs($this->user);
    }

    public function testIndex(): void
    {
        $route = route('solutions.index');

        $response = $this->get($route);

        $response->assertOk();
    }

    public function testIndexWithFilter(): void
    {
        $route = route('solutions.index');

        $response = $this->get($route, ['exercise_id' => $this->exercise->id]);

        $response->assertOk();
    }

    public function testShow(): void
    {
        $route = route('solutions.show', $this->solution);

        $response = $this->get($route);
        $response->assertOk();
    }

    public function testShowSolutionOfTrashedUser(): void
    {
        $this->expectException(NotFoundHttpException::class);
        $this->solution->user->delete();

        $route = route('solutions.show', $this->solution);

        $response = $this->get($route);

        $response->assertNotFound();
    }
}
