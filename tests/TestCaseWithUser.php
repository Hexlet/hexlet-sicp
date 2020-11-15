<?php

namespace Tests;

use App\User;

abstract class TestCaseWithUser extends TestCase
{
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }
}
