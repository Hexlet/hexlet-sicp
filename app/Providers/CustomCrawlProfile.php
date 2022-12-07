<?php

namespace App\Providers;

use Spatie\Crawler\CrawlProfiles\CrawlProfile;
use Psr\Http\Message\UriInterface;

class CustomCrawlProfile extends CrawlProfile
{
    public function shouldCrawl(UriInterface $url): bool
    {
        foreach (config('sitemap.page_exceptions') as $exception) {
            if (strpos($url->getPath(), $exception) !== false) {
                return false;
            }
        }

        return true;
    }
}
