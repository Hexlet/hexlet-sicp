<?php

namespace App\Helpers;

use App\Models\Chapter;
use App\Models\User;

class ChapterHelper
{
    public static function getChapterName(string $chapter): string
    {
        return __('sicp.chapters')[$chapter] ?? __('sicp.chapters.' . $chapter);
    }

    public static function haveRead(User $user, Chapter $chapter): bool
    {
        return $user->chapters->contains($chapter);
    }

    public static function getChapterHeaderTag(Chapter $chapter): string
    {
        return $chapter->can_read
        ? ''
        : sprintf('h%s', $chapter->getChapterLevel() + 3);
    }

    public static function getChapterOriginLink(Chapter $chapter): ?string
    {
        $links = require resource_path('chapter-links.php');

        return $links[$chapter->path] ?? null;
    }

    public static function getChapterOriginLinkForNumber(string $chapter): ?string
    {
        $links = require resource_path('chapter-links.php');

        return $links[$chapter] ?? null;
    }
}
