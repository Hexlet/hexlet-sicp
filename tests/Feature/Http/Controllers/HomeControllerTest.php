<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Comment;
use App\Models\Exercise;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Tests\ControllerTestCase;

class HomeControllerTest extends ControllerTestCase
{
    public function testIndex(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
    }

    public function testNotSeeDevLogin(): void
    {
        $response = $this->get(route('home'));

        $response->assertDontSee(
            route('auth.dev-login')
        );
    }

    public function testLogItemsDoesNotIncludeDeletedSubjects(): void
    {
        $this->seed([
            ChaptersTableSeeder::class,
            ExercisesTableSeeder::class,
        ]);

        $this->actingAs($this->user);

        /** @var Comment $comment */
        $comment = Comment::factory()
            ->user($this->user)
            ->commentable(Exercise::first())
            ->create();

        $comment->delete();

        $response = $this->get(route('home'));
        $response->assertDontSee($comment->content);
    }
}
