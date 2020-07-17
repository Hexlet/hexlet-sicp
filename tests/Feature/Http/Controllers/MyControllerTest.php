<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;

class MyControllerTest extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->user->chapters()->saveMany(
            factory(Chapter::class, 2)->make()
        );
    }

    public function testShow(): void
    {
        $this->actingAs($this->user);
        $chapter = Chapter::first();

        $response = $this->get(route('my'));

        $response->assertOk()
            ->assertSee($this->user->name)
            ->assertSee($chapter->path);
    }

    public function testShowAsGuest(): void
    {
        $this->expectException(AuthenticationException::class);

        $this->followingRedirects()->get(route('my'));
    }
}
