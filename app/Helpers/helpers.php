<?php

use App\Helpers\ChapterHelper;
use App\Helpers\ChartHelper;
use App\Helpers\CommentHelper;
use App\Helpers\ExerciseHelper;
use App\Helpers\LocalizationHelper;
use App\Helpers\RatingCommentsHelper;
use App\Helpers\RatingHelper;
use App\Helpers\TemplateHelper;
use App\Models\User;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Exercise;
use Illuminate\Support\Collection;

if (!function_exists('getChapterName')) {
    function getChapterName(string $chapter): string
    {
        return ChapterHelper::getChapterName($chapter);
    }
}
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

if (!function_exists('getChart')) {
    function getChart(?int $userId = null): Generator
    {
        return ChartHelper::getChart($userId);
    }
}

if (!function_exists('getCommentLink')) {
    function getCommentLink(Comment $comment): string
    {
        return CommentHelper::getCommentLink($comment);
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

if (!function_exists('getExercise')) {
    function getExercise(string $path): Exercise
    {
        return ExerciseHelper::getExercise($path);
    }
}

if (!function_exists('getLocalizedHttpsURL')) {
    function getLocalizedHttpsURL(string $localeCode): string
    {
        return LocalizationHelper::getLocalizedHttpsURL($localeCode);
    }
}

if (!function_exists('getPathToLocaleFlag')) {
    function getPathToLocaleFlag(string $currentLocale): string
    {
        return LocalizationHelper::getPathToLocaleFlag($currentLocale);
    }
}

if (!function_exists('getLocalizedURL')) {
    function getLocalizedURL(string $currentLocale): string
    {
        return LocalizationHelper::getLocalizedURL($currentLocale);
    }
}

if (!function_exists('getOtherLocales')) {
    function getOtherLocales(string $currentLocale, array $locales): array
    {
        return LocalizationHelper::getOtherLocales($currentLocale, $locales);
    }
}

if (!function_exists('getNativeLanguageName')) {
    function getNativeLanguageName(string $currentLocale): string
    {
        return LocalizationHelper::getNativeLanguageName($currentLocale);
    }
}

if (!function_exists('normalizeNativeLanguageName')) {
    function normalizeNativeLanguageName(string $language, string $encoding = 'utf-8'): string
    {
        return LocalizationHelper::normalizeNativeLanguageName($language, $encoding);
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
