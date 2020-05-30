<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class RatingTopProgressControllerTest extends TestCase
{
    public function testIndex()
    {
        $this->get(route('progress_top.index'))
            ->assertOk();
    }
}
