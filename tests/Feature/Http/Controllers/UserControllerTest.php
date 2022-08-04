<?php

namespace Tests\Feature\Http\Controllers;

use Tests\ControllerTestCase;

class UserControllerTest extends ControllerTestCase
{
    public function testShow(): void
    {
        $response = $this->get(route('users.show', $this->user));

        $response->assertOk();
    }
}
