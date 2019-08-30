<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use Socialite;

class GithubController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        // $user->token;

        return "success?";
    }
}
