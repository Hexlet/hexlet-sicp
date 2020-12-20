<?php

namespace Tests\Feature\Http\Controllers;

use App\Solution;
use Tests\ControllerTestCase;

class SolutionControllerTest extends ControllerTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $solutions = factory(Solution::class, 5)->make();
        $this->user->solutions()->saveMany($solutions);

        $this->actingAs($this->user);
    }

    public function testIndex(): void
    {
        $route = route('solutions.index');

        $response = $this->get($route);

        $response->assertSessionDoesntHaveErrors();
        $response->assertOk();
    }

    public function testShow(): void
    {
        $solution = Solution::inRandomOrder()->first();
        $route = route('solutions.show', $solution);

        $response = $this->get($route);
        $response->assertSessionDoesntHaveErrors();
        $response->assertOk();
    }
}
