<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\User;

class AccountControllerTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    public function testIndex()
    {
        $response = $this->get(route('account.index'));
        $response->assertRedirect();
    }

    public function testDelete()
    {
        $response = $this->get(route('account.delete'));
        $response->assertOk()
            ->assertSee($this->user->email);
    }

    public function testDestroy()
    {
        $this->actingAs($this->user);
        $this->assertAuthenticatedAs($this->user);
        $response = $this->delete(route('account.destroy', $this->user));
        $response->assertRedirect();
        $this->assertGuest();

        $this->assertNull(User::find($this->user->id));
    }

    public function testUpdate()
    {
        $name = $this->faker->name;
        $response = $this->patch(route('account.update', $this->user), [
            'name' => $name,
        ]);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', ['id' => $this->user->id, 'name' => $name]);
    }

    public function testEdit()
    {
        $this->actingAs($this->user);

        $response = $this->get(route('account.edit', $this->user->id));

        $response->assertOk();
    }
}
