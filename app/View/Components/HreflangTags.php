<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class HreflangTags extends Component
{
    public array $languageUrls = [];

    public function __construct()
    {
        $this->generateLanguageUrls();
    }

    private function generateLanguageUrls()
    {
        $defaultLocale = config('app.locale');
        $currentLocale = app()->getLocale();
        $segments = request()->segments();

        // Combine segments into a URL
        $url = implode('/', $segments);

        if ($currentLocale !== $defaultLocale) {
            $url = $currentLocale . '/' . $url;
        }

        $alternateLocale = ($currentLocale === 'en') ? 'ru' : 'en';

        $this->languageUrls[$alternateLocale] = $url;

        $this->languageUrls['x-default'] = implode('/', array_slice($segments, 1));
    }

    public function render(): View
    {
        return view('components.hreflang_tags', ['languageUrls' => $this->languageUrls]);
    }
}
