<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    private const LOGIN_PREVIOUS_URL = 'login_previous_url';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $this->setPreviousUrl(url()->previous());
        return view('auth.login');
    }

    public function redirectTo()
    {
        flash(__('auth.logged_in'))->success();

        $previousUrl = $this->pullPreviousUrl();

        if ($previousUrl) {
            return $previousUrl;
        }

        return route('my');
    }

    private function setPreviousUrl($url)
    {
        session()->put(self::LOGIN_PREVIOUS_URL, $url);
    }

    private function pullPreviousUrl()
    {
        return session()->pull(self::LOGIN_PREVIOUS_URL, null);
    }

    public function devLogin()
    {
        $user = User::first();

        Auth::login($user);

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        flash(__('auth.logout'))->success();
        return redirect()->back();
    }
}
