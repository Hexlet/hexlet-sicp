<?php

namespace App\Policies;

use App\User;
use Laravelista\Comments\Comment;

class CommentPolicy
{
    public function delete(User $user, Comment $comment): bool
    {
        return $user->id == $comment->commenter_id || isAdminComments($user);
    }

    public function update(User $user, Comment $comment): bool
    {
        return $user->id == $comment->commenter_id || isAdminComments($user);
    }

    public function reply(): bool
    {
        return true;
    }
}
