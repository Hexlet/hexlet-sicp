<?php

use Illuminate\Support\Collection;

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
