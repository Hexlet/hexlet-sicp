<?php

namespace App\Helpers;

use Illuminate\Support\Collection;

class UserChapterHelper
{
    /**
     * @param Collection $chaptersOld
     * @param Collection $chaptersNew
     *
     * @return array
     */
    public static function getDiffChapters($chaptersOld, $chaptersNew)
    {
        $chapters = $chaptersNew->diff($chaptersOld);
        if (count($chapters)) {
            return ['added', $chapters];
        }

        $chapters = $chaptersOld->diff($chaptersNew);
        if (count($chapters)) {
            return ['removed', $chapters];
        }

        return ['', []];
    }
}
