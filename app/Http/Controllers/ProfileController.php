<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', [
            'user' => Auth::user(),
        ]);
    }
}
