<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(?User $user, User $resourceUser): bool
    {
        return $resourceUser->is($user);
    }

    public function accessAdmin(User $user): bool
    {
        return $user->is_admin;
    }
}
