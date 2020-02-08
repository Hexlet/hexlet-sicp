<?php

namespace App\Policies;

use App\Comment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function viewAny()
    {
        return true;
    }

    public function view()
    {
        return true;
    }

    public function create()
    {
        return true;
    }

    public function update(User $user, Comment $comment)
    {
        return $user->id === $comment->user->id;
    }

    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->user->id;
    }

    public function restore()
    {
        return false;
    }

    public function forceDelete()
    {
        return false;
    }
}
