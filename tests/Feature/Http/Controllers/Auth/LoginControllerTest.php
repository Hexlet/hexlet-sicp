<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginControllerTest extends TestCase
{
    protected string $email = 'test@example.com';
    protected string $password = 'password';

    protected function setUp(): void
    {
        parent::setUp();

        User::factory()->create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
    }

    public function testLoginAndRedirectToPreviousUrlWhenSessionHasPreviousUrl(): void
    {
        $previousUrl = '/ru/chapters/6';

        $response = $this
            ->withSession(['url.intended' => $previousUrl])
            ->post(route('login'), [
                'email' => $this->email,
                'password' => $this->password,
            ]);

        $this->assertAuthenticated();

        $response->assertRedirect($previousUrl);
    }

    public function testLoginAndRedirectToProgressPageWhenNoPreviousUrlInSession(): void
    {
        $progressUrl = route('my.show');

        $response = $this
            ->withSession([])
            ->post(route('login'), [
                'email' => $this->email,
                'password' => $this->password,
            ]);

        $this->assertAuthenticated();

        $response->assertRedirect($progressUrl);
    }
}
