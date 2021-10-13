<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Chapter;
use App\Services\ActivityService;
use Database\Seeders\ChaptersTableSeeder;
use Tests\ControllerTestCase;

class ActivityControllerTest extends ControllerTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([
            ChaptersTableSeeder::class,
        ]);

        $this->actingAs($this->user);
    }

    public function testStoreAddChapters(): void
    {
        $myPageRoute = route('my');
        $this->from($myPageRoute);
        $chapters = Chapter::limit(3)->get();

        $this->post(route('users.chapters.store', [$this->user->id]), [
                'chapters_id' => $chapters->pluck('id')->toArray(),
            ])
            ->assertRedirect($myPageRoute)
            ->assertSessionDoesntHaveErrors();

        $this->get(route('log.index'))->assertOk();
        $this->get(route('home'))->assertOk();

        $this->assertDatabaseHas('activity_log', [
            'description' => ActivityService::ACTIVITY_CHAPTER_ADDED,
            'causer_id' => $this->user->id,
        ]);
    }

    public function testStoreRemovedChapters(): void
    {
        $myPageRoute = route('my');
        $this->from($myPageRoute);
        $chapters = Chapter::limit(3)->get();
        $this->user->chapters()->saveMany($chapters);

        $this->post(route('users.chapters.store', [$this->user->id]), [
            'chapters_id' => [],
        ])
            ->assertRedirect($myPageRoute)
            ->assertSessionDoesntHaveErrors();

        $this->user->refresh();

        $this->get(route('log.index'))->assertOk();
        $this->get(route('home'))->assertOk();

        $this->assertDatabaseHas('activity_log', [
            'description' => ActivityService::ACTIVITY_CHAPTER_REMOVED,
            'causer_id' => $this->user->id,
        ]);
    }
}
