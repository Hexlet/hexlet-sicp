<?php

namespace Tests\Unit\Model;

use App\Chapter;
use App\User;
use Tests\TestCase;

class ChapterTest extends TestCase
{
    public function testIsReadAttribute()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $user->readChapters()->attach(Chapter::first()->id);

        $chapters = Chapter::all();

        $this->assertTrue($chapters->first()->is_read);
        $this->assertFalse($chapters->last()->is_read);
    }
}
