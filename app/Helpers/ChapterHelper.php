<?php

use App\Chapter;

if (!function_exists('getChapterName')) {
    function getChapterName(string $chapter): string
    {
        return __('sicp.chapters')[$chapter] ?? __('sicp.chapters.' . $chapter);
    }
}

if (!function_exists('haveRead')) {
    function haveRead(App\User $user, App\Chapter $chapter): bool
    {
        return $user->chapters->contains($chapter);
    }
}

if (!function_exists('getChapterHeaderTag')) {
    function getChapterHeaderTag(App\Chapter $chapter): string
    {
        return $chapter->can_read
        ? ''
        : sprintf('h%s', $chapter->getChapterLevel() + 3);
    }
}

if (!function_exists('getChapterOriginLink')) {
    function getChapterOriginLink(Chapter $chapter): ?string
    {
        $links = require resource_path('chapter-links.php');

        return $links[$chapter->path] ?? null;
    }
}

if (!function_exists('getChapterOriginLinkForNumber')) {
    function getChapterOriginLinkForNumber(string $chapter): ?string
    {
        $links = require resource_path('chapter-links.php');

        return $links[$chapter] ?? null;
    }
}
