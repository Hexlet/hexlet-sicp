<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\User;
use Tests\TestCase;

class UserChapterControllerTest extends TestCase
{
    public function testStore()
    {
        $user = factory(User::class)->create();

        $chapter = factory(Chapter::class)->create();

        $this->post(route('users.chapters.store', [$user->id]), [
                'chapter_id' => $chapter->id,
            ])
            ->assertStatus(201);

        $this->assertDatabaseHas('chapter_user', [
            'user_id'    => $user->id,
            'chapter_id' => $chapter->id,
        ]);
    }
}
