<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\ControllerTestCase;

class UserControllerTest extends ControllerTestCase
{
    public function testShow(): void
    {
        $this->actingAs($this->user);

        $response = $this->get(route('users.show', $this->user));

        $response->assertOk()
            ->assertSee($this->user->name);
    }

    public function testVisitByOtherUser(): void
    {
        $visitor = factory(User::class)->create();
        $this->actingAs($visitor);

        $response = $this->get(route('users.show', $this->user));

        $response->assertOk()
            ->assertSee($this->user->name);
    }

    public function testVisitByGuest(): void
    {
        $response = $this->get(route('users.show', $this->user));

        $response->assertOk()
            ->assertSee($this->user->name);
    }

    public function testInvalidShow(): void
    {
        $this->expectException(NotFoundHttpException::class);
        $response = $this->get(route('users.show', ['user' => 'foo']));
        $response->assertNotFound();
    }
}
