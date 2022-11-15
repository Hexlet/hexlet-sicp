<?php

namespace App\Helpers;

use Parsedown;

class MarkdownHelper
{
    public static function text(string $text): string
    {
        return (new Parsedown())->text($text);
    }
}
