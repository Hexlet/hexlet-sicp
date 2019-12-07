<?php

use Illuminate\Support\Collection;

if (!function_exists('getChapterNameArray')) {
    function getChapterNameArray(array $chapters): string
    {

        return collect($chapters)->map(function ($item) {
            return $item.' '.getChapterName($item);
        })->implode(', ');
    }
}


if (!function_exists('getDiffChapters')) {
    function getDiffChapters(Collection $ChaptersOld, Collection $ChaptersNew): array
    {
        $chapters = $ChaptersNew->diff($ChaptersOld);
        if (count($chapters)) {
            return ['added', $chapters];
        } else {
            $chapters = $ChaptersOld->diff($ChaptersNew);
            if (count($chapters)) {
                return ['removed', $chapters];
            }
        }
        return ['', []];
    }
}
