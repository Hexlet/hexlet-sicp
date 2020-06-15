<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        flash(__('auth.logged_in'))->success();
        return route('my');
    }

    public function devLogin()
    {
        $user = User::first();

        Auth::login($user);

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        flash(__('auth.logout'))->success();
        return redirect()->back();
    }
}
