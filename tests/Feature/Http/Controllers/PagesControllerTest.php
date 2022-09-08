<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class PagesControllerTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * test show page about.
     *
     * @return void
     */
    public function testShow(): void
    {
        $response = $this->get(route('pages.show', ['page' => 'about']));
        $response->assertOk();
    }
}
