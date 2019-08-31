<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{

    public function testIndex()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get(route('profile.index'));

        $response->assertStatus(200)
            ->assertSee($user->name);
    }
}
