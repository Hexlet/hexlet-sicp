<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\User;
use Tests\TestCase;

class UserChapterControllerTest extends TestCase
{
    public function testStore()
    {
        $quantity = 3;

        $user = factory(User::class)->create();

        $chapters = factory(Chapter::class, $quantity)->create();

        $this->post(route('users.chapters.store', [$user->id]), [
                'chapters_id' => $chapters->pluck('id'),
            ])
            ->assertStatus(200);

        $this->assertCount($quantity, $user->readChapters);
    }
}
