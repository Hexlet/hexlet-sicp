<?php

namespace Tests\Feature\Http\Controllers\Settings;

use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Tests\ControllerTestCase;

class ProfileControllerTest extends ControllerTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs($this->user);
    }

    public function testIndex(): void
    {
        $response = $this->get(route('settings.profile.index', $this->user));
        $response->assertOk();
    }

    public function testUpdate(): void
    {
        $userParams = [
            'name' => $this->faker->name,
            'github_name' => $this->faker->userName,
            'hexlet_nickname' => $this->faker->userName,
        ];
        $response = $this->patch(route('settings.profile.update', $this->user), $userParams);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', array_merge($userParams, ['id' => $this->user->id]));
    }
}
