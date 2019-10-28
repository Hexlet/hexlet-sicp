<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class AccountControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);
        $response = $this->get(route('account.index'));

        $response->assertStatus(200)
            ->assertSee(e($user->email));
    }

    public function testDestroy()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);
        $response = $this->delete(route('account.destroy', $user));
        $response->assertStatus(302);

        $user2 = User::find($user->id);
        $this->assertNull($user2);
    }
}
