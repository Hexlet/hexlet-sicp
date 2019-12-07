<?php

use Illuminate\Support\Collection;

if (!function_exists('getChapterNameArray')) {
    function getChapterNameArray(array $chapters): string
    {

        return collect($chapters)->map(function ($item) {
            return $item . ' ' . getChapterName($item);
        })->implode(', ');
    }
}


if (!function_exists('getDiffChapters')) {
    function getDiffChapters(Collection $chaptersOld, Collection $chaptersNew): array
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
