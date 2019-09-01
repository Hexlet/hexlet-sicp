<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('user.index', [
            'user' => $user,
        ]);
    }
}
