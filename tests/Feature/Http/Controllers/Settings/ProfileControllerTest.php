<?php

namespace Tests\Feature\Http\Controllers\Settings;

use App\User;
use Tests\TestCase;

class ProfileControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    public function testIndex(): void
    {
        $this->actingAs($this->user);

        $response = $this->get(route('settings.profile.index', $this->user));

        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $name = $this->faker->name;
        $response = $this->patch(route('settings.profile.update', $this->user), [
            'name' => $name,
        ]);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', ['id' => $this->user->id, 'name' => $name]);
    }
}
