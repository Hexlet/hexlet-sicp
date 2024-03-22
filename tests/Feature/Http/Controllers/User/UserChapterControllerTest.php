<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Models\Chapter;
use Database\Seeders\ChaptersTableSeeder;
use Tests\ControllerTestCase;

class UserChapterControllerTest extends ControllerTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->seed([
            ChaptersTableSeeder::class,
        ]);

        $this->actingAs($this->user);
    }

    public function testStore(): void
    {
        $myPage = route('my');
        $chapters = Chapter::where(['path' => '1.1.1'])->orWhere(['path' => '1.1.2'])->get();

        $requestParams = [
            'chapters_id' => $chapters->pluck('id'),
        ];

        $response = $this->post(route('users.chapters.store', [$this->user]), $requestParams);

        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect($myPage);

        $expectedChapterMembersData = $chapters
            ->map(fn(Chapter $chapter) => $chapter->only('chapter_id', 'user_id'))
            ->toArray();

        $this->assertDatabaseHas('chapter_members', $expectedChapterMembersData);
    }

    public function testDestroy(): void
    {
        $this->user->chapters()->sync(
            Chapter::where(['path' => '2.1.1'])->firstOrFail()
        );
        $chapter = $this->user->chapters()->firstOrFail();

        $response = $this->delete(
            route('users.chapters.destroy', [$this->user, $chapter])
        );

        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('chapter_members', [
            'chapter_id' => $chapter->id,
            'user_id' => $this->user->id,
        ]);
    }
}
