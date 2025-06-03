<?php

namespace Tests\Feature\Http\Controllers;

use App\Github\Github;
use App\Github\GithubInterface;
use Github\Api\Gists;
use GrahamCampbell\GitHub\GitHubManager;
use Tests\TestCase;

class SitemapControllerTest extends TestCase
{
    public function testIndex(): void
    {
        $gists = $this->createMock(Gists::class);
        $gists->method('show')->willReturn(
            $this->getFixture()
        );

        $github = $this->getMockBuilder(GithubInterface::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['gists'])
            ->getMock();
        $github->method('gists')->willReturn($gists);

        $this->app->instance(GithubInterface::class, $github);

        $response = $this->get('/sitemap.xml');

        $response->assertOk();
    }

    private function getFixture(): array
    {
        $sitemapFilepath = base_path('tests/fixtures/sitemap.xml');
        return [
            "files" => [
                "sitemap.xml" => [
                    "content" => file_get_contents($sitemapFilepath),
                ],
            ],
        ];
    }
}
