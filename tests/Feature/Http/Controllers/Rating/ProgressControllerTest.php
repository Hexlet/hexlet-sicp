<?php

namespace Tests\Feature\Http\Controllers\Rating;

use App\Models\Chapter;
use App\Models\Exercise;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Support\Collection;

class ProgressControllerTest extends TestCase
{
    public function testIndex(): void
    {
        $users = User::factory()->count(10)->create();
        $users->chunk(2)->each(function (Collection $chunk, $i) {
            $chunk->each(function (User $user) use ($i): void {
                $chapters = Chapter::inRandomOrder()->limit($i)->get();
                $exercises = Exercise::inRandomOrder()->limit($i)->get();
                $user->chapters()->saveMany($chapters);
                $user->exercises()->saveMany($exercises);
            });
        });

        $this->get(route('progress_top.index'))
            ->assertOk();
    }

    public function testIndexWithEmptyRating(): void
    {
        $this->get(route('progress_top.index'))
            ->assertOk();
    }
}
