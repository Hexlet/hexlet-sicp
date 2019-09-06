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
    private $user;

    public function __construct(Socialite $socialite, User $user)
    {
        $this->socialite = $socialite;
        $this->user      = $user;
    }
    /**
     * Redirect the user to the GitHub authentication page.
     */
    public function redirectToProvider()
    {
        return $this->socialite::driver('github')->scopes(['user:email'])->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     */
    public function handleProviderCallback()
    {
        $socialiteUser = $this->socialite::driver('github')->user();

        $userForAuth = User::firstOrNew(['email' => $socialiteUser->getEmail()]);

        if (false === $userForAuth->exists) {
            $userForAuth->name              = $socialiteUser->getName();
            $userForAuth->email_verified_at = now();
            $userForAuth->password          = Hash::make(random_bytes(10));
            $userForAuth->saveOrFail();
        }

        Auth::login($userForAuth, true);
        return redirect()->route('home');
    }
}
