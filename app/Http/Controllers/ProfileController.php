<?php

namespace App\Http\Controllers;

use App\Chapter;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke()
    {
        $user     = auth()->user();
        $chapters = Chapter::with('children')->get();

        // $chapters =
        return view('profile.index', [
            'user'     => $user,
            'chapters' => $chapters
        ]);
    }
}
