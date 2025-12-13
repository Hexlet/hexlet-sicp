<?php

namespace App\DTO;

use App\Http\Requests\CommentRequest;
use App\Models\Chapter;
use App\Models\Exercise;
use Illuminate\Routing\UrlGenerator;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\RequiredWith;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CommentData extends Data
{
    public const string URL_ANCHOR = '#exercise-discussion';

    public function __construct(
        #[RequiredWith('commentable_id')]
        #[In([Chapter::class, Exercise::class])]
        public string|Optional $commentable_type,
        #[RequiredWith('commentable_type')]
        #[Min(1)]
        public int|Optional $commentable_id,
        #[Required]
        #[Min(1)]
        #[Max(CommentRequest::MAX_CONTENT_LENGTH)]
        public string $content,
        #[Min(1)]
        public int|Optional|null $parent_id = null,
    ) {
    }

    public static function redirect(UrlGenerator $url): string
    {
        return $url->previous() . self::URL_ANCHOR;
    }
}
