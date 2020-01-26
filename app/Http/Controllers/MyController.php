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
        $mainChapters = $chapters->where('parent_id', null);
        return view('my.index', compact(['user', 'chapters', 'mainChapters']));
    }
}
