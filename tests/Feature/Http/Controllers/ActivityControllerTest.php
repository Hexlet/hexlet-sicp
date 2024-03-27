<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Chapter;
use App\Services\ActivityService;
use Database\Seeders\ChaptersTableSeeder;
use Tests\ControllerTestCase;

class ActivityControllerTest extends ControllerTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([
            ChaptersTableSeeder::class,
        ]);

        $this->actingAs($this->user);
    }

    public function testIndex(): void
    {
        $response = $this->get(route('log.index'));

        $response->assertOk();
    }
}
