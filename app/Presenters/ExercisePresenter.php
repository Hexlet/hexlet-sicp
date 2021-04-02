<?php

namespace App\Presenters;

use App\Models\Exercise;
use Hemp\Presenter\Presenter;

/**
 * @mixin Exercise
 * @property-read string $underscorePath
 * @property-read string $title
 * @property-read string $fullTitle
 */
class ExercisePresenter extends Presenter
{
    public function getUnderscorePathAttribute(): string
    {
        return str_replace('.', '_', $this->path);
    }

    public function getTitleAttribute(): string
    {
        $underscoredPath = $this->underscorePath;

        $titleTranslatePath = "exercises/{$underscoredPath}.title";

        return __($titleTranslatePath);
    }

    public function getFullTitleAttribute(): string
    {
        $path = $this->path;
        $exerciseTitle = $this->title;

        return "$path $exerciseTitle";
    }
}
