<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;

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
}
