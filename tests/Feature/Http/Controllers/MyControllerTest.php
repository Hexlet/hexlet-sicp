<?php

namespace Tests\Feature\Http\Controllers;

use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Tests\ControllerTestCase;

class MyControllerTest extends ControllerTestCase
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
        $response = $this->get(route('my.show'));
        $response->assertOk();
    }
}
