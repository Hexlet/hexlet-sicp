<?php

namespace App\Helpers;

use App\Models\User;

class UserHelper
{
    /**
     * @param User $user
     *
     * @return string
     */
    public static function getProfileImageLink($user)
    {
        $email = $user->email;
        $encryptEmail = md5($email);

        return "https://www.gravatar.com/avatar/{$encryptEmail}?s=500";
    }
}
