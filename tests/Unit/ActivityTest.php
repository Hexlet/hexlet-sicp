<?php

namespace Tests\Unit;

use App\ReadChapter;
use App\User;
use Tests\TestCase;

class ActivityTest extends TestCase
{
    public function testCreateActivityWhenUserCompleteChapter()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

        $readChapter = factory(ReadChapter::class)->create();

        $this->assertDatabaseHas('activities', [
            'user_id' => auth()->id(),
            'subject_id' => $readChapter->id,
            'subject_type' => ReadChapter::class,
            'type' => 'created_readchapter',
        ]);
    }
}
