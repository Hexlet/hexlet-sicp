<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\ReadChapter;
use App\User;
use Tests\TestCase;

class UserChapterControllerTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    public function testStore()
    {
        $quantity = 3;

        factory(ReadChapter::class)->create(['user_id' => $this->user->id]);

        $this->assertCount(1, $this->user->readChapters);

        $chapters = factory(Chapter::class, $quantity)->create();

        $this->post(route('users.chapters.store', [$this->user->id]), [
                'chapters_id' => $chapters->pluck('id')->toArray(),
            ])
            ->assertRedirect(route('profile'));

        $this->user->refresh();

        $this->assertCount($quantity, $this->user->readChapters);
    }
}
