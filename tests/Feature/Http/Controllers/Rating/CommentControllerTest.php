<?php

namespace Tests\Feature\Http\Controllers\Rating;

use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    public function testIndex(): void
    {
        $this->get(route('comments_top.index'))
            ->assertOk();
    }
}
