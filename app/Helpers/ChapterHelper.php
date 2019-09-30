<?php

use App\User;

if (!function_exists('getChapterName')) {
    function getChapterName(string $chapter): string
    {
        return  __('sicp.chapters')[$chapter];
    }
}

if (!function_exists('haveRead')) {
    function haveRead(App\User $user, App\Chapter $chapter)
    {
        return $user->chapters->contains($chapter);
    }
}
