<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Chapter;
use App\Models\Comment;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Tests\ControllerTestCase;
use Tests\TestCase;

class ChapterControllerTest extends ControllerTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([
            ChaptersTableSeeder::class,
            UsersTableSeeder::class,
        ]);
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
            Comment::factory()
                ->count(5)
                ->user($this->user)
                ->commentable($chapter)
                ->make()
        );
        $response = $this->get(route('chapters.show', $chapter));

        $response->assertOk();
    }
}
