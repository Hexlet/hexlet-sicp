<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Chapter;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Illuminate\Auth\AuthenticationException;
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
    }

    public function testShow(): void
    {
        $this->actingAs($this->user);
        $chapter = Chapter::first();

        $response = $this->get(route('my'));

        $response->assertOk()
            ->assertSee($this->user->name)
            ->assertSee($chapter->path);
    }

    public function testShowAsGuest(): void
    {
        $this->expectException(AuthenticationException::class);

        $this->followingRedirects()->get(route('my'));
    }
}
