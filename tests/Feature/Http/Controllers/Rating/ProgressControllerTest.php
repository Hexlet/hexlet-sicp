<?php

namespace Tests\Feature\Http\Controllers\Rating;

use Tests\TestCase;

class ProgressControllerTest extends TestCase
{
    public function testIndex(): void
    {
        $this->get(route('progress_top.index'))
            ->assertOk();
    }
}
