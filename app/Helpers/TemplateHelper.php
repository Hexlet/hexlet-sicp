<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class TemplateHelper
{
    public static function isActiveRoute(string $routeAlias): bool
    {
        /** @var \Illuminate\Routing\Route */
        $currentRoute = Request::route();

        return $currentRoute->getName() === $routeAlias;
    }

    public static function getTitleContent(string $header): string
    {
        $name = __('layout.title.name_SICP');
        return "{$header} - {$name}";
    }

    public static function getBookLink(string $locale): string
    {
        return $locale === 'en'
            ? 'https://web.mit.edu/6.001/6.037/sicp.pdf'
            : 'https://mirror.yandex.ru/mirrors/ftp.linux.kiev.ua/docs/developer/general/sicp-ru/sicp-ru-screen.pdf';
    }
}
