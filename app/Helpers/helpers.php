<?php

use App\Helpers\ChapterHelper;
use App\Helpers\ExerciseHelper;
use App\Helpers\RatingCommentsHelper;
use App\Helpers\RatingHelper;
use App\Helpers\TemplateHelper;
use App\Models\User;
use App\Models\Chapter;
use App\Models\Exercise;
use Illuminate\Support\Collection;

if (!function_exists('getTitleContent')) {
    function getTitleContent(string $titleName): string
    {
        return TemplateHelper::getTitleContent($titleName);
    }
}
if (!function_exists('haveRead')) {
    function haveRead(User $user, Chapter $chapter): bool
    {
        return ChapterHelper::haveRead($user, $chapter);
    }
}

if (!function_exists('getChapterHeaderTag')) {
    function getChapterHeaderTag(Chapter $chapter): string
    {
        return ChapterHelper::getChapterHeaderTag($chapter);
    }
}

if (!function_exists('getChapterOriginLink')) {
    function getChapterOriginLink(Chapter $chapter): ?string
    {
        return ChapterHelper::getChapterOriginLink($chapter);
    }
}

if (!function_exists('getChapterOriginLinkForNumber')) {
    function getChapterOriginLinkForNumber(string $chapter): ?string
    {
        return ChapterHelper::getChapterOriginLinkForNumber($chapter);
    }
}

if (!function_exists('getExerciseListingViewFilepath')) {
    function getExerciseListingViewFilepath(Exercise $exercise): string
    {
        return ExerciseHelper::getExerciseListingViewFilepath($exercise);
    }

}

if (!function_exists('getExerciseOriginLink')) {
    function getExerciseOriginLink(Exercise $exercise): ?string
    {
        return ExerciseHelper::getExerciseOriginLink($exercise);
    }
}

if (!function_exists('getCommentsRating')) {
    function getCommentsRating(): Collection
    {
        return RatingCommentsHelper::getCommentsRating();
    }
}

if (!function_exists('getCalculatedRating')) {
    function getCalculatedRating(): Collection
    {
        return RatingHelper::getCalculatedRating();
    }
}

if (!function_exists('isActiveRoute')) {
    function isActiveRoute(string $routeAlias): bool
    {
        return TemplateHelper::isActiveRoute($routeAlias);
    }
}
