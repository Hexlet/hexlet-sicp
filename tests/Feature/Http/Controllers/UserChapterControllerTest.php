<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\User;
use Tests\TestCase;

class UserChapterControllerTest extends TestCase
{
    public function testStore()
    {
        $firstReadQuantity = 3;

        $user = factory(User::class)->create();

        $chapters = factory(Chapter::class, $firstReadQuantity)->create();

        $this->post(route('users.chapters.store', [$user->id]), [
                'chapters_id' => $chapters->pluck('id'),
            ])
            ->assertStatus(200);

        $this->assertCount($firstReadQuantity, $user->readChapters);


        //Смотрим, что если изменили список прочитанных глав, то старые удаляются
        $secondReadQuantity = 6;

        $chapters = factory(Chapter::class, $secondReadQuantity)->create();

        $this->post(route('users.chapters.store', [$user->id]), [
            'chapters_id' => $chapters->pluck('id'),
        ])
            ->assertStatus(200);

        $this->assertCount($secondReadQuantity, $user->refresh()->readChapters);
    }
}
