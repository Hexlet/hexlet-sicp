<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function show(string $username)
    {
        dd($username);
/*        return view('user.index', [
            'user' => $user,
        ]);*/
    }
}
