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
        return $comment->user->is($user);
    }

    public function delete(User $user, Comment $comment)
    {
        return $comment->user->is($user);
    }

    public function restore()
    {
        return false;
    }

    public function forceDelete()
    {
        return false;
    }

    public function reply()
    {
        return true;
    }
}
