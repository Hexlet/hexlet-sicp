<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class WelcomeControllerTest extends TestCase
{
    public function testIndex(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function testNotSeeDevLogin(): void
    {
        $response = $this->get('/');

        $response->assertDontSee(
            route('auth.dev-login')
        );
    }
}
