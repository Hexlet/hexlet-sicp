<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\Factories;

class WatchNodesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->chapter = Factories::createNodesTree()[0];
    }

    public function testBookNodesView(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee($this->chapter->description);
        
        foreach ($this->chapter->childs()->get() as $section) {
            $response->assertSee($section->description);

            foreach ($section->childs()->get() as $exercise) {
                $response->assertSee($exercise->description);
            }
        }
    }
}
