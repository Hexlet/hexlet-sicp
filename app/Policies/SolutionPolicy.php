<?php

namespace App\Policies;

use App\Models\Solution;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class SolutionPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return Auth::check();
    }

    public function view(User $user, Solution $solution): bool
    {
        return (int)$user->id === (int)$solution->user_id;
    }

    public function delete(User $user, Solution $solution): bool
    {
        return (int)$user->id === (int)$solution->user_id;
    }
}
