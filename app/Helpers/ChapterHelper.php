<?php

use Illuminate\Support\Collection;

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

if (!function_exists('getChapterHeaderTag')) {
    function getChapterHeaderTag(App\Chapter $chapter): string
    {
        return $chapter->can_read
        ? ''
        : sprintf('h%s', $chapter->getChapterLevel() + 3);
    }
}
if (!function_exists('getReadChapterPercent')) {
    function getReadChapterPercent($readChapters, $chapters)
    {
        if ($chapters->count() === 0) {
            return 0;
        }
        return ($readChapters->count() / $chapters->count()) * 100;
    }
}
if (!function_exists('buildChaptersTreeFromStructure')) {
    function buildChaptersTreeFromStructure(Collection $chapters, $treeStructure)
    {
        $chaptersKeyByPath = $chapters->keyBy('path');
        $treeBuilder = function ($tree, Collection $acc) use (&$treeBuilder, $chaptersKeyByPath) {
            foreach ($tree as $treeNode) {
                $chapter = $chaptersKeyByPath->get($treeNode['path']);
                $chilrenNodes = array_get($treeNode, 'children');
                $chapter->children = empty($chilrenNodes)
                    ? collect()
                    : $treeBuilder($chilrenNodes, collect());

                $acc->push($chapter);
            }
            return $acc;
        };

        return $treeBuilder($treeStructure, collect());
    }
}
