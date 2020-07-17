<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testShow(): void
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get(route('users.show', $user));

        $response->assertOk()
            ->assertSee($user->name);
    }

    public function testVisitByOtherUser(): void
    {
        $user = factory(User::class)->create();
        $visitor = factory(User::class)->create();
        $this->actingAs($visitor);

        $response = $this->get(route('users.show', $user));

        $response->assertOk()
            ->assertSee($user->name);
    }

    public function testVisitByGuest(): void
    {
        $user = factory(User::class)->create();
        $response = $this->get(route('users.show', $user));

        $response->assertOk()
            ->assertSee($user->name);
    }

    public function testInvalidShow(): void
    {
        $this->expectException(NotFoundHttpException::class);
        $response = $this->get(route('users.show', ['user' => 'foo']));
        $response->assertNotFound();
    }
}
