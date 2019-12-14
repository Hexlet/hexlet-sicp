<?php

namespace Tests\Feature\Http\Controllers;

use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testShow()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $response = $this->get(route('users.show', $user));

        $response->assertStatus(200)
            ->assertSee(e($user->name));
    }

    public function testVisitByOtherUser()
    {
        $user = factory(User::class)->create();
        $visitor = factory(User::class)->create();
        $this->actingAs($visitor);

        $response = $this->get(route('users.show', $user));

        $response->assertStatus(200)
            ->assertSee(e($user->name));
    }

    public function testVisitByGuest()
    {
        $user = factory(User::class)->create();
        $visitor = factory(User::class)->create();
        // $this->actingAs($visitor);

        $response = $this->get(route('users.show', $user));

        $response->assertStatus(200)
            ->assertSee(e($user->name));
    }

    public function testInvalidShow()
    {
        $this->expectException(NotFoundHttpException::class);
        $response = $this->get(route('users.show', ['user' => 'foo']));
        $response->assertNotFound();
        $response->assertStatus(404);
    }
}
