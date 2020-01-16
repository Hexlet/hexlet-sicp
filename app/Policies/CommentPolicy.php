<?php

namespace App\Policies;

use Laravelista\Comments\Comment;

class CommentPolicy
{

    public function create($user): bool
    {
        return true;
    }

    public function delete($user, Comment $comment): bool
    {
        return $user->id == $comment->commenter_id || $user->isAdminComments();
    }

    public function update($user, Comment $comment): bool
    {
        return $user->id == $comment->commenter_id || $user->isAdminComments();
    }

    public function reply($user, Comment $comment): bool
    {
        return $user->id != $comment->commenter_id;
    }
}
