<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class HreflangTags extends Component
{
    public array $languageUrls = [];
    public string $currentLocale;

    public function __construct()
    {
        $this->generateLanguageUrls();
    }

    private function generateLanguageUrls(): void
    {
        $defaultLocale = config('app.locale');
        $this->currentLocale = app()->getLocale();
        $segments = request()->segments();

        $url = implode('/', $segments);

        if ($this->currentLocale !== $defaultLocale) {
            $url = "$this->currentLocale/$url";
        }

        if ($this->currentLocale === 'ru') {
            $this->languageUrls['en'] = $this->removeLanguagePrefixes($url);
        } else {
            $this->languageUrls['ru'] = "ru/$url";
        }

        $this->languageUrls['x-default'] = $this->removeLanguagePrefixes($url);
    }

    public function removeLanguagePrefixes(string $url): string
    {
        return preg_replace('/(^\/ru\/?|\/ru\/?|\/?ru\/?|\/$)/u', '', $url);
    }

    public function render(): View
    {
        return view('components.hreflang_tags', ['languageUrls' => $this->languageUrls, 'currentLocale' => $this->currentLocale]);
    }
}
