<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testIndex(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
    }

    public function testNotSeeDevLogin(): void
    {
        $response = $this->get(route('home'));

        $response->assertDontSee(
            route('auth.dev-login')
        );
    }
}
