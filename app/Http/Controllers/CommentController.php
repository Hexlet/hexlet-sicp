<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use function getCommentLink;

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
        $commentableModel = $request->get('commentable_type');
        $commentableId = $request->get('commentable_id');
        /** @var Model $commentable */
        $commentable = $commentableModel::findOrFail($commentableId);

        $user = auth()->user();

        $comment = $user->comments()->save(
            Comment::make($request->all())
        );

        activity()
            ->performedOn($commentable)
            ->causedBy($user)
            ->withProperties(['comment' => $comment, 'url' => getCommentLink($comment)])
            ->log('commented');

        return redirect(getCommentLink($comment));
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
        $comment->fill(['content' => $content]);

        if ($comment->save()) {
            flash()->success(__('layout.flash.success'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return redirect(getCommentLink($comment));
    }

    public function show(Comment $comment)
    {
        return redirect(
            getCommentLink($comment)
        );
    }

    public function destroy(Comment $comment)
    {
        if ($comment->delete()) {
            flash()->success(__('layout.flash.success'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return back();
    }
}
