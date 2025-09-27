<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirectTo()
    {
        flash(__('passwords.reset'))->success();
        return route('my.show');
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|same:password',
        ];
    }
}
