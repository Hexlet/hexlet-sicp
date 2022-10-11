<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserCommentController extends Controller
{
    public function index(Request $request, User $user): View
    {
        $comments = $user->comments()->with('commentable')->get();
        return view('user.comment.index', compact(
            'comments'
        ));
    }
}
