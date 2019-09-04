<?php

namespace App\Http\Controllers\Auth\Social;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Socialite;

class GithubController extends Controller
{
    private $socialite;

    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
    }
    /**
     * Redirect the user to the GitHub authentication page.
     */
    public function redirectToProvider()
    {
        return $this->socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     */
    public function handleProviderCallback()
    {
        $socialiteUser = $this->socialite::driver('github')->user();

        $authUser = User::firstOrNew(['email' => $socialiteUser->getEmail()]);

        if (false === $authUser->exists) {
            $authUser->name              = $socialiteUser->getName();
            $authUser->email_verified_at = now();
            $authUser->password          = Hash::make(random_bytes(10));
        }

        $authUser->saveOrFail();
        Auth::login($authUser, true);
        return redirect()->route('home');
    }
}
