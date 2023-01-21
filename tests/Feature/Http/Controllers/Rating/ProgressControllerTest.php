<?php

namespace Tests\Feature\Http\Controllers\Rating;

use App\Models\Chapter;
use App\Models\User;
use Tests\TestCase;

class ProgressControllerTest extends TestCase
{
    public function testIndex(): void
    {

        $users = User::factory()->count(10)->create();
        $users->each(function (User $user): void {
            $count = random_int(1, 10);
            $chapters = Chapter::inRandomOrder()->limit($count)->get();
            $user->chapters()->saveMany($chapters);
        });

        $this->get(route('progress_top.index'))
            ->assertOk();
    }
}
