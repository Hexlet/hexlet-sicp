<?php

namespace App\Helpers;

class TemplateHelper
{
    public static function getTitleContent(string $header): string
    {
        $name = __('layout.title.name_SICP');
        return "{$header} - {$name}";
    }

    public static function getBookLink(string $locale): string
    {
        return match ($locale) {
            'ru' => 'https://drive.google.com/file/d/1xc9r6txuTZMZ5lPy9YQuD1Dwv9spg7Nt/view?usp=sharing',
            default => 'https://drive.google.com/file/d/1t3rlltwuU85ow7g0ZI6Kx7eY5n-Umh8p/view?usp=sharing',
        };
    }
}
