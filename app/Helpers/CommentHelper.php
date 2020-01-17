<?php

use Illuminate\Support\Collection;
use App\User;

if (!function_exists('isAdminComments')) {
    function isAdminComments(User $user): bool
    {
        return in_array($user->email, \Config::get('comments.admins'));
    }
}
