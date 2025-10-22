<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(?User $user, User $resourceUser): bool
    {
        return $user && ($resourceUser->is($user) || $user->is_admin);
    }
}
