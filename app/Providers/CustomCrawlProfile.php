<?php

namespace App\Providers;

use Spatie\Crawler\CrawlProfiles\CrawlProfile;
use Psr\Http\Message\UriInterface;

class CustomCrawlProfile extends CrawlProfile
{
    public function shouldCrawl(UriInterface $url): bool
    {
        if ($url->getHost() !== 'localhost') {
            return false;
        }
        
        $i = 0;

        foreach (config('sitemap.page_exceptions') as $exception) {
            if (strpos($url->getPath(), $exception) !== false) {
                $i++;
            }
        }

        if ($i) {
            return false;
        }
        return true;
    }
}
