<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;

/**
 * Class ProfileControllerTest
 * @property User $user
 */
class MyControllerTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->user->chapters()->saveMany(
            factory(Chapter::class, 2)->make()
        );
    }

    public function testShow()
    {
        $this->actingAs($this->user);
        $chapter = Chapter::first();

        $response = $this->get(route('my'));

        $response->assertStatus(200)
            ->assertSee(e($this->user->name))
            ->assertSee(e($chapter->path));
    }

    public function testShowAsGuest()
    {
        $this->expectException(AuthenticationException::class);
        $this->followingRedirects()->get(route('my'));
    }
}
