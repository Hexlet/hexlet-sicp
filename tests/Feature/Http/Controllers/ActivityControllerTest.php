<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\ReadChapter;
use Tests\ControllerTestCase;

class ActivityControllerTest extends ControllerTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs($this->user);
    }

    public function testStoreOnMyPage(): void
    {
        $myPage = route('my');
        $this->from($myPage);
        $quantity = 3;

        factory(ReadChapter::class)->create(['user_id' => $this->user->id]);

        $this->assertCount(1, $this->user->readChapters);

        $chapters = factory(Chapter::class, $quantity)->create();

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
            'description' => 'added',
        ]);
    }
}
