<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\User;
use Illuminate\Auth\AuthenticationException;
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

    public function testDestroy()
    {
        /** @var User $user */
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $chapter = Chapter::inRandomOrder()->first();

        $user->chapters()->attach($chapter);

        $this->actingAs($user)->from(
            route('chapters.show', $chapter)
        );

        $this->assertDatabaseHas('read_chapters', [
            'chapter_id' => $chapter->id,
            'user_id' => $user->id,
        ]);

        $response = $this->delete(
            route('users.chapters.destroy', [$user, $chapter])
        );

        $response->assertRedirect(route('chapters.show', $chapter));

        $this->assertDatabaseMissing('read_chapters', [
            'chapter_id' => $chapter->id,
            'user_id' => $user->id,
        ]);
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
