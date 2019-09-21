<?php

if (!function_exists('getChapterName')) {
    function getChapterName(string $chapter): string
    {
        return  __('sicp.chapters')[$chapter];
    }
}
