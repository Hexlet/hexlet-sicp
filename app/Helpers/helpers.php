<?php

use App\Helpers\ActivityLogHelper;
use App\Helpers\ChapterHelper;
use App\Helpers\ChartHelper;
use App\Helpers\CommentHelper;
use App\Helpers\ExerciseHelper;
use App\Helpers\LocalizationHelper;
use App\Helpers\RatingCommentsHelper;
use App\Helpers\RatingHelper;
use App\Helpers\TemplateHelper;
use App\Helpers\UserChapterHelper;
use App\Helpers\UserHelper;

if (!function_exists('getLogItemDescription')) {
    /**
     * @param App\Models\Activity $logItem
     * @return string
     */
    function getLogItemDescription($logItem)
    {
        return ActivityLogHelper::getLogItemDescription($logItem);
    }
}

if (!function_exists('getChapterName')) {
    /**
     * @param string $chapter
     * @return string
     */
    function getChapterName($chapter)
    {
        return ChapterHelper::getChapterName($chapter);
    }
}

if (!function_exists('haveRead')) {
    /**
     * @param App\Models\User $user
     * @param App\Models\Chapter $chapter
     * @return bool
     */
    function haveRead($user, $chapter)
    {
        return ChapterHelper::haveRead($user, $chapter);
    }
}

if (!function_exists('getChapterHeaderTag')) {
    /**
     * @param App\Models\Chapter $chapter
     * @return string
     */
    function getChapterHeaderTag($chapter)
    {
        return ChapterHelper::getChapterHeaderTag($chapter);
    }
}

if (!function_exists('getChapterOriginLink')) {
    /**
     * @param App\Models\Chapter $chapter
     * @return ?string
     */
    function getChapterOriginLink($chapter)
    {
        return ChapterHelper::getChapterOriginLink($chapter);
    }
}

if (!function_exists('getChapterOriginLinkForNumber')) {
    /**
     * @param string $chapter
     * @return ?string
     */
    function getChapterOriginLinkForNumber($chapter)
    {
        return ChapterHelper::getChapterOriginLinkForNumber($chapter);
    }
}

if (!function_exists('getChart')) {
    /**
     * @param int $userId
     * @return Generator
     */
    function getChart($userId = null)
    {
        return ChartHelper::getChart($userId);
    }
}

if (!function_exists('getCommentLink')) {
    /**
     * @param App\Models\Comment $comment
     * @return string
     */
    function getCommentLink($comment)
    {
        return CommentHelper::getCommentLink($comment);
    }
}

if (!function_exists('getExerciseListingViewFilepath')) {
    /**
     * @param string $exercisePath
     * @return string
     */
    function getExerciseListingViewFilepath($exercisePath)
    {
        return ExerciseHelper::getExerciseListingViewFilepath($exercisePath);
    }

}

if (!function_exists('getExerciseTitle')) {
    /**
     * @param App\Models\Exercise $exercise
     * @return ?string
     */
    function getExerciseTitle($exercise)
    {
        return ExerciseHelper::getExerciseTitle($exercise);
    }
}

if (!function_exists('getExerciseOriginLink')) {
    /**
     * @param App\Models\Exercise $exercise
     * @return ?string
     */
    function getExerciseOriginLink($exercise)
    {
        return ExerciseHelper::getExerciseOriginLink($exercise);
    }
}

if (!function_exists('getExercise')) {
    /**
     * @param string $path
     * @return App\Models\Exercise
     */
    function getExercise($path)
    {
        return ExerciseHelper::getExercise($path);
    }
}

if (!function_exists('getLocalizedHttpsURL')) {
    /**
     * @param string $localeCode
     * @return string
     */
    function getLocalizedHttpsURL($localeCode)
    {
        return LocalizationHelper::getLocalizedHttpsURL($localeCode);
    }
}

if (!function_exists('getPathToLocaleFlag')) {
    /**
     * @param string $currentLocale
     * @return string
     */
    function getPathToLocaleFlag($currentLocale)
    {
        return LocalizationHelper::getPathToLocaleFlag($currentLocale);
    }
}

if (!function_exists('getLocalizedURL')) {
    /**
     * @param string $currentLocale
     * @return string
     */
    function getLocalizedURL($currentLocale)
    {
        return LocalizationHelper::getLocalizedURL($currentLocale);
    }
}

if (!function_exists('getOtherLocales')) {
    /**
     * @param string $currentLocale
     * @param array $locales
     * @return array
     */
    function getOtherLocales($currentLocale, $locales)
    {
        return LocalizationHelper::getOtherLocales($currentLocale, $locales);
    }
}

if (!function_exists('getNativeLanguageName')) {
    /**
     * @param string $currentLocale
     * @return string
     */
    function getNativeLanguageName($currentLocale)
    {
        return LocalizationHelper::getNativeLanguageName($currentLocale);
    }
}

if (!function_exists('normalizeNativeLanguageName')) {
    /**
     * @param string $language
     * @param string $encoding
     * @return string
     */
    function normalizeNativeLanguageName($language, $encoding = 'utf-8')
    {
        return LocalizationHelper::normalizeNativeLanguageName($language, $encoding);
    }
}

if (!function_exists('getCommentsRating')) {
    /**
     * @return Illuminate\Support\Collection
     */
    function getCommentsRating()
    {
        return RatingCommentsHelper::getCommentsRating();
    }
}

if (!function_exists('getCalculatedRating')) {
    /**
     * @return Illuminate\Support\Collection
     */
    function getCalculatedRating()
    {
        return RatingHelper::getCalculatedRating();
    }
}

if (!function_exists('isActiveRoute')) {
    /**
     * @param string $routeAlias
     * @return bool
     */
    function isActiveRoute($routeAlias)
    {
        return TemplateHelper::isActiveRoute($routeAlias);
    }
}

if (!function_exists('getDiffChapters')) {
    /**
     * @param Illuminate\Support\Collection $chaptersOld
     * @param Illuminate\Support\Collection $chaptersNew
     * @return array
     */
    function getDiffChapters($chaptersOld, $chaptersNew)
    {
        return UserChapterHelper::getDiffChapters($chaptersOld, $chaptersNew);
    }
}

if (!function_exists('getProfileImageLink')) {
    /**
     * @param App\Models\User $user
     * @return string
     */
    function getProfileImageLink($user)
    {
        return UserHelper::getProfileImageLink($user);
    }
}
