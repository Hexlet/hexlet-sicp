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
        $myPage = route('my');
        $this->from($myPage);
        $chapters = Chapter::limit(3)->get();

        $this->post(route('users.chapters.store', [$this->user->id]), [
                'chapters_id' => $chapters->pluck('id')->toArray(),
            ])
            ->assertRedirect($myPage)
            ->assertSessionDoesntHaveErrors();

        $this->user->refresh();

        $response = $this->get(route('log.index'));
        $response->assertOk()->assertSee($chapters->first()->path);

        $response = $this->get(route('index'));
        $response->assertOk()->assertSee($chapters->first()->path);

        $this->assertDatabaseHas('activity_log', [
            'description' => ActivityService::ACTIVITY_CHAPTER_ADDED,
        ]);
    }

    public function testStoreRemovedChapters(): void
    {
        $myPage = route('my');
        $this->from($myPage);
        $chapters = Chapter::limit(3)->get();
        $this->user->chapters()->saveMany($chapters);

        $this->post(route('users.chapters.store', [$this->user->id]), [
            'chapters_id' => [],
        ])
            ->assertRedirect($myPage)
            ->assertSessionDoesntHaveErrors();

        $this->user->refresh();

        $response = $this->get(route('log.index'));
        $response->assertOk()->assertSee($chapters->first()->path);

        $response = $this->get(route('index'));
        $response->assertOk()->assertSee($chapters->first()->path);

        $this->assertDatabaseHas('activity_log', [
            'description' => ActivityService::ACTIVITY_CHAPTER_REMOVED,
        ]);
    }
}
