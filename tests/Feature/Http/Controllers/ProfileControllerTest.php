<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function canViewProfilePage()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get('/profile');

        $response->assertStatus(200)
            ->assertSee($user->name);
    }
}
