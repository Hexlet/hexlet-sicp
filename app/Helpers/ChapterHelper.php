<?php

namespace App\Helpers;

use App\Models\Chapter;
use App\Models\User;

class ChapterHelper
{
    public static function fullChapterName(string $chapterNumber): string
    {
        $chapterTitle = __("sicp.chapters")[$chapterNumber];

        return "$chapterNumber $chapterTitle";
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

    public static function getChapterDescendants(Chapter $chapter): array
    {
        $descendants = [];
        $children = $chapter->children;

        foreach ($children as $child) {
            if (!$child->children->isEmpty()) {
                $descendants = [...$descendants, ...self::getChapterDescendants($child)];
            } else {
                $descendants[] = $child;
            }
        }

        return $descendants;
    }
}
