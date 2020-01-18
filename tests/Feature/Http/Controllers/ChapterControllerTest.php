<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use Tests\TestCase;
use App\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function testIndexAsGuest()
    {
        $response = $this->get(route('chapters.index'));

        $response->assertStatus(200);
    }

    public function testIndexAsUser()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->get(route('chapters.index'));

        $response->assertStatus(200);
    }

    public function testShow()
    {
        $chapter = Chapter::inRandomOrder()->first();
        $response = $this->get(route('chapters.show', $chapter));

        $response->assertStatus(200);
    }

    public function testInvalidShow()
    {
        $this->expectException(NotFoundHttpException::class);
        $response = $this->get(route('chapters.show', ['chapter' => 'foo']));
        $response->assertNotFound();
    }
}
