<?php

namespace Tests\Feature\Http\Controllers;

use App\ReadChapter;
use App\User;
use Tests\TestCase;

class RatingTopControllerTest extends TestCase
{
    public function testIndex(): void
    {
        factory(User::class, 10)
            ->create()
            ->each(function ($user): void {
                factory(ReadChapter::class, mt_rand(0, 10))->create([
                    'user_id' => $user->id,
                ]);
            });

        $this->get(route('top.index'))
            ->assertOk();
    }
}
