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

    public function testUpdateSameName(): void
    {
        $response = $this->patch(route('settings.profile.update', $this->user), [
            'name' => $this->user->name,
        ]);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', ['id' => $this->user->id, 'name' => $this->user->name]);
    }

    /**
     * @dataProvider dataInvalidNamesProvider
     */
    public function testUpdateInvalidName(string $invalidName): void
    {
        $this->expectException(ValidationException::class);

        $this->patch(route('settings.profile.update', $this->user), [
                'name' => $invalidName,
            ])
            ->assertRedirect()
            ->assertSessionHasErrors('name');
    }

    protected function dataInvalidNamesProvider(): array
    {
        return [
            ['-'],
            [Str::random(256)],
        ];
    }
}
