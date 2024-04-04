<?php

namespace App\Presenters;

use App\Models\Chapter;
use Hemp\Presenter\Presenter;

/**
 * @mixin Chapter
 * @property-read string $fullTitle
 */
class ChapterPresenter extends Presenter
{
    public function getFullTitleAttribute(): string
    {
        $path = $this->path;

        $chapterTitle = __("sicp.chapters")[$path];

        return "$path $chapterTitle";
    }
}
