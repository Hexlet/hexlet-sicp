<?php

if (!function_exists('chapterName')) {
    function chapterName(string $chapter): string
    {
        return  __('sicp.chapters')[$chapter];
    }
}
