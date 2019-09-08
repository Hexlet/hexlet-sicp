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

        $readChapter = new ReadChapter();

        $readChapter->fill([
            'user_id' => $user->id,
            'chapter_id' => null,
        ]);

        $this->expectException(ValidationException::class);

        $readChapter->save();
    }

    public function testChapterIdIsExistInDatabase()
    {
        $user = factory(User::class)->create();

        $readChapter = new ReadChapter();

        $readChapter->fill([
            'user_id' => $user->id,
            'chapter_id' => 999,
        ]);

        $this->expectException(ValidationException::class);

        $readChapter->save();
    }

    public function testUserIdIsRequired()
    {
        $chapter = factory(Chapter::class)->create();

        $readChapter = new ReadChapter();

        $readChapter->fill([
            'chapter_id' => $chapter->id,
            'user_id' => null,
        ]);

        $this->expectException(ValidationException::class);

        $readChapter->save();
    }
}
