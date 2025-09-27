<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class RegisterControllerTest extends TestCase
{
    public function testRegisterWithCyrillicEmail(): void
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $name = $this->faker->name;
        $password = $this->faker->password(8);
        $email = 'тест@тест.рф';

        $this->post(route('register'), [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => $email,
            'name'  => $name,
        ]);
    }

    public function testRegisterWithMissingDomain(): void
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $name = $this->faker->name;
        $password = $this->faker->password(8);
        $email = 'test@mail';

        $this->post(route('register'), [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => $email,
            'name'  => $name,
        ]);
    }

    public function testRegisterWithValidEmail(): void
    {
        $name = $this->faker->name;
        $email = $this->faker->safeEmail();
        $password = $this->faker->password(8);

        $response = $this->post(route('register'), [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertRedirect(route('my.show'));

        $this->assertDatabaseHas('users', [
            'email' => $email,
            'name'  => $name,
        ]);

        $user = User::where('email', $email)->first();
        $this->assertTrue(Hash::check($password, $user->password));
    }
}
