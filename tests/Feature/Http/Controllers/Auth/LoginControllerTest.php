<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
    }

    public function testRedirectsToPreviousUrlAfterLogin()
    {
        $previousUrl = '/ru/chapters/6';

        $response = $this
            ->withSession(['login_previous_url' => $previousUrl])
            ->post('/login', [
                'email' => 'test@example.com',
                'password' => 'password',
            ]);

        $response->assertRedirect($previousUrl);
    }

    public function testRedirectsToProgressPageWhenNoPreviousUrl()
    {
        $progressUrl = route('my');

        $response = $this
            ->withSession([])
            ->post('/login', [
                'email' => 'test@example.com',
                'password' => 'password',
            ]);

        $response->assertRedirect($progressUrl);
    }
}
