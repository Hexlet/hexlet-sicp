<?php

namespace App\Http\Controllers;

use App\Chapter;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function __invoke()
    {
        $user     = Auth::user();
        $chapters = Chapter::with('children')->get();

        // $chapters =
        return view('profile.index', [
            'user'     => $user,
            'chapters' => $chapters
        ]);
    }
}
