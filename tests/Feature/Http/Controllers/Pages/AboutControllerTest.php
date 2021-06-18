<?php

namespace Tests\Feature\Http\Controllers\Pages;

use Tests\ControllerTestCase;

class AboutControllerTest extends ControllerTestCase
{

    public function testIndex(): void
    {
        $response = $this->get(route('about.index'));

        $response->assertOk();
    }
}
