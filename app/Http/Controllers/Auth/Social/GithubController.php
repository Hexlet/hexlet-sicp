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
        try {
            /**
             * @var \Laravel\Socialite\Two\User|null $user
             */
            $user = Socialite::driver('github')->user();
        } catch (Exception $e) {
            Session::flash('error', 'socialite.github.error');
            return redirect('/login');
        }
        $authUser = User::firstOrNew(['email' => $user->getEmail()]);

        if (false === $authUser->exists) {
            $authUser->name              = $user->getName();
            $authUser->email_verified_at = now();
            $authUser->password          = Hash::make(random_bytes(10));
        }

        try {
            $authUser->saveOrFail();
            Auth::login($authUser, true);
            return redirect()->route('home');
        } catch (\Exception $e) {
            Session::flash('error', 'Произошла ошибка при попытке войти');
        }
    }
}
