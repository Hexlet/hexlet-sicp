<?php

namespace App\Helpers;

class TemplateHelper
{
    public static function getTitleContent(string $header): string
    {
        $name = __('layout.title.name_SICP');
        return "{$header} - {$name}";
    }
}
