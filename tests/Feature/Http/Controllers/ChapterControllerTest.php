<?php

namespace Tests\Feature\Http\Controllers;

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
}
