<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class LoginControllerTest extends TestCase
{
    public function testRedirectsToPreviousUrlAfterLogin()
    {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        $previousUrl = '/ru/chapters/6';

        Session::put('login_previous_url', $previousUrl);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect($previousUrl);
    }
}
