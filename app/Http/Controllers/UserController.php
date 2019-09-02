<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function show(string $name)
    {
        return view('user.index', [
            'user' => User::where('name', $name)->firstOrFail(),
        ]);
    }
}
