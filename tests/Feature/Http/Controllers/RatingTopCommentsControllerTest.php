<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class RatingTopCommentsControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->get(route('comments_top.index'))
            ->assertOk();
    }
}
