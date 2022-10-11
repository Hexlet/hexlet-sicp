<?php

namespace Tests\Feature\Http\Controllers;

use Tests\ControllerTestCase;

class UserCommentControllerTest extends ControllerTestCase
{
    public function testUserCommentIndex(): void
    {
        $response = $this->get(route('users.comments.index', $this->user));

        $response->assertOk();
    }
}
