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

        $password = $this->faker->password(8);

        $this->post(route('register'), [
            'name' => $this->faker->name,
            'email' => 'тест@тест.рф',
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'тест@тест.рф',
        ]);
    }

    public function testRegisterWithMissingDomain(): void
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $password = $this->faker->password(8);

        $this->post(route('register'), [
            'name' => $this->faker->name,
            'email' => 'test@mail',
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'test@mail',
        ]);
    }

    public function testRegisterWithValidEmail(): void
    {
        $email = $this->faker->userName . '@gmail.com';

        $password = $this->faker->password(8);

        $response = $this->post(route('register'), [
            'name' => $this->faker->name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertRedirect(route('my'));

        $this->assertDatabaseHas('users', [
            'email' => $email,
        ]);
    }
}
