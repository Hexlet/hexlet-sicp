<?php

namespace App\Helpers;

use App\Models\Chapter;
use App\Models\User;

class ChapterHelper
{
    /**
     * @param string $chapter
     *
     * @return string
     */
    public static function getChapterName($chapter)
    {
        return __('sicp.chapters')[$chapter] ?? __('sicp.chapters.' . $chapter);
    }

    /**
     * @param User $user
     * @param Chapter $chapter
     *
     * @return bool
     */
    public static function haveRead($user, $chapter)
    {
        return $user->chapters->contains($chapter);
    }

    /**
     * @param Chapter $chapter
     *
     * @return string
     */
    public static function getChapterHeaderTag($chapter)
    {
        return $chapter->can_read
        ? ''
        : sprintf('h%s', $chapter->getChapterLevel() + 3);
    }

    /**
     * @param Chapter $chapter
     *
     * @return ?string
     */
    public static function getChapterOriginLink($chapter)
    {
        $links = require resource_path('chapter-links.php');

        return $links[$chapter->path] ?? null;
    }

    /**
     * @param string $chapter
     *
     * @return ?string
     */
    public static function getChapterOriginLinkForNumber($chapter)
    {
        $links = require resource_path('chapter-links.php');

        return $links[$chapter] ?? null;
    }
}
