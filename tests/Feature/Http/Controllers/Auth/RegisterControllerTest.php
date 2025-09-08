<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;
use Egulias\EmailValidator\EmailValidator;
use VCR\VCR;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $cassettePath = storage_path('tests/fixtures/cassettes');

        if (!is_dir($cassettePath)) {
            mkdir($cassettePath, 0777, true);
        }

        VCR::configure()->setCassettePath($cassettePath)->enableLibraryHooks(['stream_wrapper', 'curl']);
        VCR::turnOn();
    }

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
        $this->app->instance(EmailValidator::class, new class extends EmailValidator {
            public function isValid($email, $validation): bool
            {
                return true;
            }
        });

        VCR::insertCassette('register_valid_email');

        $name = $this->faker->name;
        $email = $this->faker->freeEmail();
        $password = $this->faker->password(8);

        $response = $this->post(route('register'), [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertRedirect(route('my'));

        $this->assertDatabaseHas('users', [
            'email' => $email,
            'name'  => $name,
        ]);

        $user = User::where('email', $email)->first();
        $this->assertTrue(Hash::check($password, $user->password));

        VCR::eject();
    }
}
