<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Comment::class, 'comment');
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'commentable_type' => 'required|string',
                'commentable_id' => 'required|min:1',
                'content' => 'required|string|min:1|max:500',
            ]
        );
        $user = auth()->user();

        $comment = $user->comments()->save(
            Comment::make($request->all())
        );

        return $this->redirectBackToComment($comment);
    }

    public function update(Request $request, Comment $comment)
    {
        $this->validate(
            $request,
            [
                'commentable_type' => 'required|string',
                'commentable_id' => 'required|min:1',
                'content' => 'required|string|min:1|max:500',
            ]
        );
        $content = $request->get('content', $comment->content);
        $comment->update(['content' => $content]);

        return $this->redirectBackToComment($comment);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }

    /**
     * @param Comment $comment
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private function redirectBackToComment(Comment $comment)
    {
        return redirect(
            url()->previous() . '#comment-' . $comment->id
        );
    }
}
