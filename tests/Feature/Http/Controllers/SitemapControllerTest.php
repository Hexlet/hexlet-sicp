<?php

namespace Tests\Feature\Http\Controllers;

use Github\Api\Gists;
use GrahamCampbell\GitHub\GitHubManager;
use Tests\TestCase;

class SitemapControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $gists = $this->createMock(Gists::class);
        $gists->method('show')->willReturn(
            $this->getFixture()
        );

        $github = $this->getMockBuilder(GitHubManager::class)
            ->disableOriginalConstructor()
            ->addMethods(['gists'])
            ->getMock();
        $github->method('gists')->willReturn($gists);

        $this->app->instance(GitHubManager::class, $github);

        $response = $this->get('/sitemap.xml');

        $response->assertOk();
    }

    private function getFixture()
    {
        $sitemapFilepath = base_path('tests/fixtures/sitemap.xml');
        return [
            "files" => [
                "sitemap.xml" => [
                    "content" => file_get_contents($sitemapFilepath)
                ]
            ]
        ];
    }
}
