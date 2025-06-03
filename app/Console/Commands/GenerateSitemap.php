<?php

namespace App\Console\Commands;

use App\Github\Github;
use App\Github\GithubInterface;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /** @var string */
    protected $signature = 'sitemap:generate';
    /** @var string  */
    protected $description = 'Generate the sitemap.';

    private GithubInterface $github;

    public function __construct(GithubInterface $github)
    {
        parent::__construct();
        $this->github = $github;
    }

    public function handle(): void
    {
        $sitemap = SitemapGenerator::create(config('app.url'))->getSitemap();
        $this->info(__('console.generate_sitemap'));
        $this->github->gists()->update(config('sitemap.gist_id'), [
            'files' => [
                'sitemap.xml' => [
                    'content' => $sitemap->render(),
                ],
            ],
        ]);
    }
}
