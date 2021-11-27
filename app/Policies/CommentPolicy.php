<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function viewAny(): bool
    {
        return true;
    }

    public function view(): bool
    {
        return true;
    }

    public function create(): bool
    {
        return \Auth::check();
    }

    public function update(User $user, Comment $comment): bool
    {
        return $comment->user->is($user);
    }

    public function delete(User $user, Comment $comment): bool
    {
        return $comment->user->is($user);
    }

    public function restore(): bool
    {
        return false;
    }

    public function forceDelete(): bool
    {
        return false;
    }

    public function reply(): bool
    {
        return \Auth::check();
    }
}
