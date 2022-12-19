<?php

namespace App\Presenters;

use Hemp\Presenter\Presenter;

class UserPresenter extends Presenter
{
    public function getProfileImageLink(): string
    {
        $email = $this->email;
        $encryptEmail = md5($email);

        return "https://www.gravatar.com/avatar/{$encryptEmail}?s=500";
    }
}
