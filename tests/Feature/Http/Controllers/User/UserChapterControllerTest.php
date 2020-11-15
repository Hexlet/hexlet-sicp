<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Chapter;
use Tests\TestCaseWithUser;

class UserChapterControllerTest extends TestCaseWithUser
{

    protected function setUp(): void
    {
        parent::setUp();

        factory(Chapter::class, 3)->create();
    }

    public function testDestroy(): void
    {
        $this->actingAs($this->user);

        $chapter = Chapter::inRandomOrder()->first();

        $this->user->chapters()->attach($chapter);

        $this->actingAs($this->user)->from(
            route('chapters.show', $chapter)
        );

        $completedChapterData = [
            'chapter_id' => $chapter->id,
            'user_id' => $this->user->id,
        ];
        $this->assertDatabaseHas('read_chapters', $completedChapterData);

        $response = $this->delete(
            route('users.chapters.destroy', [$this->user, $chapter])
        );

        $response->assertRedirect(route('chapters.show', $chapter));
        $response->assertSessionDoesntHaveErrors();

        $this->assertDatabaseMissing('read_chapters', $completedChapterData);
    }

    public function testStore(): void
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
