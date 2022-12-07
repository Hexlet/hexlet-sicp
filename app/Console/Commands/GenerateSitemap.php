<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Psr\Http\Message\UriInterface;

class GenerateSitemap extends Command
{
    /** @var string */
    protected $signature = 'sitemap:generate';
    /** @var string  */
    protected $description = 'Generate the sitemap.';

    public function handle(): void
    {
        SitemapGenerator::create(config('app.url'))
            ->writeToFile(config('sitemap.sitemap_path'));
    }
}
