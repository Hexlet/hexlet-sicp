<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\User;
use Illuminate\Http\Request;
use Auth;

class MyController extends Controller
{
    public function __invoke()
    {
        $user     = User::with('readChapters')->find(Auth::id());
        $chapters = Chapter::with('children')->get();

        // $chapters =
        return view('my.index', [
            'user'     => $user,
            'chapters' => $chapters
        ]);
    }
}
