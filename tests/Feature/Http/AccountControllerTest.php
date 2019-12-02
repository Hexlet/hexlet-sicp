<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Chapter;
use App\ReadChapter;

class AccountControllerTest extends TestCase
{
    private $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
    }

    public function testIndex()
    {
        $response = $this->get(route('account.index'));
        $response->assertStatus(302);
    }

    public function testDelete()
    {
        $response = $this->get(route('account.delete'));
        $response->assertStatus(200)
            ->assertSee(e($this->user->email));
    }
    public function testDestroy()
    {
        $chapter = factory(Chapter::class)->create();

        factory(ReadChapter::class)->create([
            'user_id' => $this->user->id,
            'chapter_id' => $chapter->id,
        ]);

        $response = $this->delete(route('account.destroy', $this->user));
        $response->assertStatus(302);

        $user2 = User::find($this->user->id);
        $this->assertNull($user2);
    }

    public function testUpdateName()
    {
        $this->patch(route('account.update', $this->user->id), [
            'name' => 'Claus',
        ]);
        $user2 = User::find($this->user->id);
        $this->assertEquals('Claus', $user2->name);
    }
}
