<?php

namespace App\Helpers;

use App\Models\User;

class UserHelper
{
    public static function getProfileImageLink(User $user): string
    {
        $email = $user->email;
        $encryptEmail = md5($email);

        return "https://www.gravatar.com/avatar/{$encryptEmail}?s=500";
    }
}
