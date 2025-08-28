<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testRegisterWithCyrillicEmail(): void
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $this->post(route('register'), [
            'email' => 'тест@тест.рф',
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'тест@тест.рф',
        ]);
    }

    public function testRegisterWithMissingDomain(): void
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $this->post(route('register'), [
            'email' => 'test@mail',
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'test@mail',
        ]);
    }

    public function testRegisterWithValidEmail(): void
    {
        $email = $this->faker->userName . '@gmail.com';

        $response = $this->post(route('register'), [
            'name' => $this->faker->name,
            'email' => $email,
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);

        $response->assertRedirect(route('my'));

        $this->assertDatabaseHas('users', [
            'email' => $email,
        ]);
    }
}
