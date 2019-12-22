<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use GrahamCampbell\GitHub\GitHubManager;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap.';

    private $github;

    public function __construct(GitHubManager $github)
    {
        parent::__construct();
        $this->github = $github;
    }

    public function handle()
    {
        $sitemap = SitemapGenerator::create(config('app.url'))->getSitemap();
        $this->github->gists()->update(config('sitemap.gist_id'), [
            'files' => [
                'sitemap.xml' => [
                    'content' => $sitemap->render()
                ],
            ]
        ]);
    }
}
