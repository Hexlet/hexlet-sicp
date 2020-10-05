<?php

namespace Tests\Feature\Http\Controllers\Settings;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

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

    public function testUpdateSameName(): void
    {
        $response = $this->patch(route('settings.profile.update', $this->user), [
            'name' => $this->user->name,
        ]);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('users', ['id' => $this->user->id, 'name' => $this->user->name]);
    }

    public function updateInvalidValuesProvider()
    {
        return [
            ['name', '-'],
            ['name', Str::random(256)],
        ];
    }

    /**
     * @test
     * @dataProvider updateInvalidValuesProvider
     */
    public function testInvalidUpdate($formInput, $invalidValue): void
    {
        $this->expectException(ValidationException::class);

        $this->patch(route('settings.profile.update', $this->user), [
                $formInput => $invalidValue,
            ])
            ->assertStatus(302)
            ->assertSessionHasErrors($formInput);
    }
}
