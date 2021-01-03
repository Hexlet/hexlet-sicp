<?php

namespace App\Helpers;

use App\Models\Comment;

class CommentHelper
{
    /**
     * @param Comment $comment
     *
     * @return string
     */
    public static function getCommentLink($comment)
    {
        $commentableResourceName = str_plural(strtolower(class_basename($comment->commentable_type)));
        $commentableUrl = route("{$commentableResourceName}.show", $comment->commentable);
        $commentUrl = "{$commentableUrl}#comment-{$comment->id}";
        return $commentUrl;
    }
}
