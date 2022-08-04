<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Chapter;
use App\Models\Comment;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Tests\ControllerTestCase;

class ChapterControllerTest extends ControllerTestCase
{
    private Chapter $chapter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([
            ChaptersTableSeeder::class,
            UsersTableSeeder::class,
        ]);

        $chapter = Chapter::first();
        $chapter->comments()->saveMany(
            Comment::factory()
                ->count(5)
                ->user($this->user)
                ->commentable($chapter)
                ->make()
        );

        $this->chapter = $chapter;
    }

    public function testIndex(): void
    {
        $response = $this->get(route('chapters.index'));

        $response->assertOk();
    }

    public function testShow(): void
    {
        $response = $this->get(route('chapters.show', $this->chapter));

        $response->assertOk();
    }
}
