<?php

namespace App\Helpers;

use App\Models\Comment;

class CommentHelper
{
    /**
     * @throws \Exception
     */
    public static function getCommentableUrl(Comment $comment): string
    {
        $route = match ($comment->commentable_type) {
            'App\Models\Chapter' => 'chapters.show',
            'App\Models\Exercise' => 'exercises.show',
            default => throw new \Exception('Invalid commentable type'),
        };

        return route($route, $comment->commentable);
    }
}
