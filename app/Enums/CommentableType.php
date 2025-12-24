<?php

namespace App\Enums;

use App\Models\Chapter;
use App\Models\Exercise;

enum CommentableType: string
{
    case CHAPTER = Chapter::class;
    case EXERCISE = Exercise::class;
}
