<?php

namespace App\Providers;

use Spatie\Crawler\CrawlProfiles\CrawlProfile;
use Psr\Http\Message\UriInterface;
use Illuminate\Support\Str;

class CustomCrawlProfile extends CrawlProfile
{
    public function shouldCrawl(UriInterface $url): bool
    {
        $parsedAppUrl = parse_url(config('app.url'));

        $appUrlHost = $parsedAppUrl['host'];

        if ($url->getHost() !== $appUrlHost) {
            return false;
        }

        if (Str::contains($url->getPath(), config('sitemap.url_parts_to_filter'))) {
            return false;
        }

        return true;
    }
}
