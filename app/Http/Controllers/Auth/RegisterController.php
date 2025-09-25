<?php

namespace App\Http\Controllers\Auth;

use App\Http\Rules\EmailValidation;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirectTo()
    {
        return route('my.index');
    }

    protected function validator(array $data): ValidatorContract
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,filter|string|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|same:password',
        ]);
    }

    protected function create(array $data): User
    {
        flash(__('auth.mail.send_link'));
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
