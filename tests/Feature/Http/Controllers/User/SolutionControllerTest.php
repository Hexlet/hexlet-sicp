<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\Solution;
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

    public function testShow(): void
    {
        $solution = $this->user->solutions()->first();

        $response = $this->get(route('users.solutions.show', [$this->user, $solution]));
        $response->assertOk();
    }
}
