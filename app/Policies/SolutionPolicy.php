<?php

namespace App\Policies;

use App\Solution;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;

class SolutionPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return Auth::check();
    }

    public function view(User $user, Solution $solution)
    {
        return $user->id == $solution->user_id;
    }

    public function delete(User $user, Solution $solution)
    {
        return $user->id == $solution->user_id;
    }
}
