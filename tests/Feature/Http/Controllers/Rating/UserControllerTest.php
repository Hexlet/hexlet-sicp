<?php

namespace Tests\Feature\Http\Controllers\Rating;

use App\Models\Chapter;
use App\Models\User;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $users = User::factory()->count(10)->create();
        $users->each(function (User $user): void {
            $count = random_int(1, 10);
            $chapters = Chapter::inRandomOrder()->limit($count)->get();
            $user->chapters()->saveMany($chapters);
        });
    }

    public function testIndex(): void
    {
        $this->get(route('top.index'))
            ->assertOk();
    }
}
