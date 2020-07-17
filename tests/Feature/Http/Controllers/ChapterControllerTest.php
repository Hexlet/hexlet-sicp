<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\Comment;
use Tests\TestCase;

class ChapterControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        factory(Chapter::class, 2)
            ->create()
            ->each(function (Chapter $chapter) {
                $chapter->children()->saveMany(
                    factory(Chapter::class, mt_rand(0, 3))->make()
                );
            });
    }

    public function testIndex(): void
    {
        $response = $this->get(route('chapters.index'));

        $response->assertOk();
    }

    public function testShow(): void
    {
        $chapter = Chapter::inRandomOrder()->first();
        $chapter->comments()->saveMany(
            factory(Comment::class, 5)->state('with_user')->make()
        );
        $response = $this->get(route('chapters.show', $chapter));

        $response->assertOk();
    }
}
