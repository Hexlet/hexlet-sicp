<?php

use App\Chapter;
use DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('chapter', function (BreadcrumbsGenerator $trail, \App\Chapter $chapter): void {
    $trail->push(__('breadcrumb.contents'), route('chapters.index'));

    $pushChapters = function (Chapter $chapter) use ($trail, &$pushChapters): void {

        if ($chapter->parent) {
            $pushChapters($chapter->parent);
        }

        $chapterName = getChapterName($chapter->path);
        $trail->push("{$chapter->path} {$chapterName}", route('chapters.show', $chapter));
    };

    $pushChapters($chapter);
});

Breadcrumbs::for('exercise', function (BreadcrumbsGenerator $trail, \App\Exercise $exercise): void {
    $trail->parent('chapter', $exercise->chapter);
    $textPart = __('breadcrumb.exercise');
    $trail->push("{$textPart} {$exercise->path}", route('exercises.show', $exercise));
});
