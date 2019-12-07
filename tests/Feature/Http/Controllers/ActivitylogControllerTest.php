<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\ReadChapter;
use App\User;
use Tests\TestCase;

class ActivityControllerTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    public function testStore()
    {
        $quantity = 3;

        factory(ReadChapter::class)->create(['user_id' => $this->user->id]);

        $this->assertCount(1, $this->user->readChapters);

        $chapters = factory(Chapter::class, $quantity)->create();

        $this->post(route('users.chapters.store', [$this->user->id]), [
                'chapters_id' => $chapters->pluck('id')->toArray(),
            ])
            ->assertRedirect(route('my'));

        $this->user->refresh();

        $response = $this->get(route('log.index'));
        $response->assertStatus(200)->assertSee($chapters[0]->path);

        $response = $this->get(route('index'));
        $response->assertStatus(200)->assertSee($chapters[0]->path);

        $this->assertDatabaseHas('activity_log', [
            'description' => 'added'
        ]);
    }
}
