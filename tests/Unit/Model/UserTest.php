<?php

namespace Tests\Unit\Model;

use App\Chapter;
use App\ReadChapter;
use Tests\TestCaseWithUser;

class UserTest extends TestCaseWithUser
{
    public function testChapter(): void
    {
        $chapter = factory(Chapter::class)->create();

        factory(ReadChapter::class)->create([
            'user_id' => $this->user->id,
            'chapter_id' => $chapter->id,
        ]);

        $this->assertCount(1, $this->user->chapters);
    }
}
