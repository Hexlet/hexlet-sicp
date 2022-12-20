<?php

use App\Models\Chapter;
use App\Models\Exercise;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('chapter', function (BreadcrumbTrail $trail, Chapter $chapter): void {
    $trail->push(__('breadcrumb.contents'), route('chapters.index'));

    $pushChapters = function (Chapter $chapter) use ($trail, &$pushChapters): void {

        if ($chapter->parent) {
            $pushChapters($chapter->parent);
        }

        $chapterName = App\Helpers\ChapterHelper::fullChapterName($chapter->path);
        $trail->push($chapterName, route('chapters.show', $chapter));
    };

    $pushChapters($chapter);
});

Breadcrumbs::for('exercise', function (BreadcrumbTrail $trail, Exercise $exercise): void {
    $trail->parent('chapter', $exercise->chapter);
    $textPart = __('breadcrumb.exercise');
    $trail->push("{$textPart} {$exercise->path}", route('exercises.show', $exercise));
});
