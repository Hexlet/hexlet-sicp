<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(Request $request): View
    {
        $query = Comment::with(['user', 'commentable']);

        $userId = $request->get('user_id');
        $commentableType = $request->get('commentable_type');
        $commentableId = $request->get('commentable_id');

        $user = User::find($userId);

        if (!empty($userId)) {
            $query->where('user_id', $userId);
        }

        if (!empty($commentableType) && !empty($commentableId)) {
            $query->where('commentable_type', $commentableType)
                ->where('commentable_id', $commentableId);
        }

        $comments = $query->orderBy('created_at', 'desc')->paginate(50);

        return view('admin.comments', compact('comments', 'user'));
    }
}
