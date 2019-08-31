<?php

namespace Tests\Feature;

use App\Classes\Services\ChaptersService;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChaptersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

    }

    public function testAddLeaves()
    {
//INSERT INTO `chapters` (`id`, `number`, `name`, `book`, `created_at`, `updated_at`) VALUES (NULL, '1', 'page1', 'sicp', '2019-08-31 00:00:00', '2019-08-31 00:00:00'),
//(NULL, '1.1', 'page 1 1', 'sicp', '2019-08-31 00:00:00', '2019-08-31 00:00:00'),
//(NULL, '2', 'page 2', 'sicp', '2019-08-31 00:00:00', '2019-08-31 00:00:00'),
//(NULL, '2.1', 'page 2 1', 'sicp', '2019-08-31 00:00:00', '2019-08-31 00:00:00'),
//(NULL, '2.1.1', 'page 2 1 1', 'sicp', '2019-08-31 00:00:00', '2019-08-31 00:00:00'),
//(NULL, '2.2', 'page 2 2', 'sicp', '2019-08-31 00:00:00', '2019-08-31 00:00:00');

    }
    public function testGetLeaves()
    {
        $chapters = (new ChaptersService())->getChapters('sicp');
        self::assertIsArray($chapters);
    }

    public function testIsLeaf()
    {
        $chapters = (new ChaptersService())->getChapters('sicp');
        foreach ($chapters as $chapter) {
            self::assertTrue(isset($chapter->isLeaf));
        }
        dd($chapters);
    }


}
