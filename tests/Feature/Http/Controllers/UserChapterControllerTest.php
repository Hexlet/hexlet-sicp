<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\User;
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

        $completedChapterData = [
            'chapter_id' => $chapter->id,
            'user_id' => $user->id,
        ];
        $this->assertDatabaseHas('read_chapters', $completedChapterData);

        $response = $this->delete(
            route('users.chapters.destroy', [$user, $chapter])
        );

        $response->assertRedirect(route('chapters.show', $chapter));
        $response->assertSessionDoesntHaveErrors();

        $this->assertDatabaseMissing('read_chapters', $completedChapterData);
    }

    public function testStore()
    {
        $myPage = route('my');
        $chapters = Chapter::inRandomOrder()->limit(2)->get();

        $postData = [
            'chapters_id' => $chapters->pluck('id')->toArray(),
        ];

        $this
            ->actingAs($this->user)
            ->from($myPage)
            ->post(route('users.chapters.store', [$this->user]), $postData)
            ->assertRedirect($myPage)
            ->assertSessionDoesntHaveErrors();

        $this->assertEquals(
            $chapters->count(),
            $this->user->readChapters->count()
        );

        $this->assertDatabaseHas('read_chapters', [
                'chapter_id' => $chapters->first()->id,
                'user_id' => $this->user->id,
        ]);
    }
}
