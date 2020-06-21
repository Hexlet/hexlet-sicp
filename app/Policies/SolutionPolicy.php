<?php

namespace App\Policies;

use App\Solution;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SolutionPolicy
{
    use HandlesAuthorization;
    
    public function create(User $user)
    {
        return true;
    }

    public function delete(User $user, Solution $solution)
    {
        return $user->id == $solution->user_id;
    }
}
