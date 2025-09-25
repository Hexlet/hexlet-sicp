<?php

namespace Tests\Feature\Http\Controllers\My;

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

        $this->actingAs($this->user);
    }

    public function testIndex(): void
    {
        $response = $this->get(route('my.solutions.index'));
        $response->assertOk();
    }
}
