<?php

namespace Tests\Feature\Http\Controllers\Rating;

use App\ReadChapter;
use App\User;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testIndex(): void
    {
        factory(User::class, 10)
            ->create()
            ->each(function ($user): void {
                factory(ReadChapter::class, random_int(0, 10))->create([
                    'user_id' => $user->id,
                ]);
            });

        $this->get(route('top.index'))
            ->assertOk();
    }
}
