<?php

namespace App\Helpers;

use Illuminate\Support\Collection;

class UserChapterHelper
{
    public static function getDiffChapters(Collection $chaptersOld, Collection $chaptersNew): array
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
