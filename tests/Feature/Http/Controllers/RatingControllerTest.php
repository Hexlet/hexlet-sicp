<?php

namespace Tests\Feature\Http\Controllers;

use App\ReadChapter;
use App\User;
use Tests\TestCase;

class RatingControllerTest extends TestCase
{
    public function testIndex()
    {
        factory(User::class, 10)
            ->create()
            ->each(function ($user) {
                factory(ReadChapter::class, mt_rand(0, 10))->create([
                    'user_id' => $user->id,
                ]);
            });

        $this->get(route('ratings.index'))
            ->assertStatus(200);
    }
}
