<?php

namespace Tests\Unit\Model;

use App\Chapter;
use App\ReadChapter;
use App\User;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class ReadChapterTest extends TestCase
{
    public function testChapterIdIsRequired()
    {
        $user = factory(User::class)->create();

        $this->expectException(ValidationException::class);

        $this->createReadChapters(null, $user->id);
    }

    public function testChapterIdIsExistInDatabase()
    {
        $user = factory(User::class)->create();

        $this->expectException(ValidationException::class);

        $this->createReadChapters(999, $user->id);
    }

    public function testUserIdIsRequired()
    {
        $chapter = factory(Chapter::class)->create();

        $this->expectException(ValidationException::class);

        $this->createReadChapters($chapter->id);
    }

    private function createReadChapters($chapterId = null, $userId = null)
    {
        $readChapter = new ReadChapter();

        $readChapter->fill([
            'chapter_id' => $chapterId,
            'user_id' => $userId,
        ]);

        $readChapter->save();
    }
}
