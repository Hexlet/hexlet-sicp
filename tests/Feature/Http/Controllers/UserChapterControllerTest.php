<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\ReadChapter;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\UnauthorizedException;
use Tests\TestCase;

class UserChapterControllerTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        factory(Chapter::class, 3)->create();
    }

    public function testStore()
    {
        $myPage = route('my');
        $chapters = Chapter::all();

        $this
            ->actingAs($this->user)
            ->from($myPage)
            ->post(route('users.chapters.store', [$this->user]), [
                'chapters_id' => $chapters->pluck('id')->toArray(),
            ])
            ->assertRedirect($myPage);

        $this->assertEquals($chapters->count(), $this->user->readChapters->count());
    }

    public function testStoreAsGuest()
    {
        $this->expectException(AuthenticationException::class);

        $this->post(route('users.chapters.store', [$this->user]), [
                'chapters_id' => [],
            ]);
    }
}
