<?php

namespace Tests\Feature\Http\Controllers;

use App\ReadChapter;
use App\User;
use Tests\TestCase;

class RatingControllerTest extends TestCase
{
    public function testIndex()
    {
        $userWithThree = factory(User::class)->create();
        factory(ReadChapter::class, 3)->create([
            'user_id' => $userWithThree->id,
        ]);

        factory(User::class)->create();

        $userWithTwo = factory(User::class)->create();
        factory(ReadChapter::class, 2)->create([
            'user_id' => $userWithTwo->id,
        ]);

        $response = $this->getJson(route('ratings.index'))
            ->assertStatus(200);

        $responseData = $response->json();

        $this->assertEquals([3, 2, 0], array_column($responseData, 'read_chapters_count'));
    }
}
