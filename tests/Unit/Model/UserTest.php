<?php

namespace Tests\Unit\Model;

use App\Chapter;
use App\User;
use DB;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testChapter()
    {
        $user = factory(User::class)->create();

        $chapter = factory(Chapter::class)->create();

        DB::table('chapter_user')->insert([
            'user_id'    => $user->id,
            'chapter_id' => $chapter->id,
        ]);

        $this->assertCount(1, $user->chapters);
    }
}
