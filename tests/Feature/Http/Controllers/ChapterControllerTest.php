<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use Tests\TestCase;
use App\User;

class ChapterControllerTest extends TestCase
{
    public function testIndexAsGuest()
    {
        $response = $this->get(route('chapters.index'));

        $response->assertStatus(200);
    }

    public function testIndexAsUser()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->get(route('chapters.index'));

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $chapter = Chapter::inRandomOrder()->first();
        $response = $this->get(route('chapters.show', $chapter));

        $response->assertStatus(200);
    }
}
