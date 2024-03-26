<?php

namespace Tests\Feature\Feature\Http\Controllers\Chapter;

use App\Models\Chapter;
use App\Models\ChapterMember;
use App\Models\User;
use App\Services\ActivityService;
use Database\Seeders\ChaptersTableSeeder;
use Tests\TestCase;

class ChapterMemberControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([
            ChaptersTableSeeder::class,
        ]);
    }

    public function testFinish(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        $chapter = Chapter::wherePath('1.1.1')->first();

        $this->actingAs($user);

        $response = $this->put(route('chapters.members.finish', $chapter));

        $response->assertRedirect();
        $response->assertSessionDoesntHaveErrors();

        $user->refresh();

        $chapterMember = ChapterMember::where([
            'chapter_id' => $chapter->id,
            'user_id' => $user->id,
        ])->firstOrFail();

        $this->assertTrue($chapterMember->isFinished());
        $this->assertDatabaseHas('activity_log', [
            'description' => ActivityService::ACTIVITY_CHAPTER_MEMBER_FINISHED,
            'subject_type' => $chapterMember::class,
            'subject_id' => $chapterMember->id,
            'causer_id' => $user->id,
            'causer_type' => $user::class,
        ]);
    }
}
