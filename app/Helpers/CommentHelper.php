<?php

namespace App\Helpers;

use App\Models\Comment;

class CommentHelper
{
    public static function getCommentLink(Comment $comment): string
    {
        $commentableResourceName = str_plural(strtolower(class_basename($comment->commentable_type)));
        $commentableUrl = route("{$commentableResourceName}.show", $comment->commentable);
        $commentUrl = "{$commentableUrl}#comment-{$comment->id}";
        return $commentUrl;
    }
}
