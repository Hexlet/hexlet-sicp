<?php

namespace Tests\Feature\Http\Controllers;

use Github\Api\Gists;
use GrahamCampbell\GitHub\GitHubManager;
use Tests\TestCase;

use function GuzzleHttp\json_decode;

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
            ->setMethods(['gists'])
            ->getMock();
        $github->method('gists')->willReturn($gists);

        $this->app->instance(GitHubManager::class, $github);

        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
    }

    private function getFixture()
    {
        return [
            "files" => [
                "sitemap.xml" => [
                    "content" => "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http:\/\/www.sitemaps.org\/schemas\/sitemap\/0.9\" xmlns:xhtml=\"http:\/\/www.w3.org\/1999\/xhtml\">\n<\/urlset>"
                ]
            ]
        ];
    }
}
