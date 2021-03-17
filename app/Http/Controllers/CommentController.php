<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Models\User;
use App\Services\ActivityService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

use function getCommentLink;

class CommentController extends Controller
{
    /**
     * @var ActivityService
     */
    private ActivityService $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->authorizeResource(Comment::class, 'comment');
        $this->activityService = $activityService;
    }

    public function store(CommentRequest $request): RedirectResponse
    {
        $commentableModel = $request->get('commentable_type');
        $commentableId = $request->get('commentable_id');
        /** @var Model $commentable */
        $commentable = $commentableModel::findOrFail($commentableId);

        /** @var User $user */
        $user = auth()->user();

        /** @var Comment $comment */
        $comment = $user->comments()->save(
            Comment::make($request->validated())
        );

        $this->activityService->logCreatedComment($user, $comment, $commentable);

        return redirect(getCommentLink($comment));
    }

    public function update(CommentRequest $request, Comment $comment): RedirectResponse
    {
        $content = $request->get('content', $comment->content);
        $comment->fill(['content' => $content]);

        if ($comment->save()) {
            flash()->success(__('layout.flash.success'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return redirect(getCommentLink($comment));
    }

    public function show(Comment $comment): RedirectResponse
    {
        return redirect(
            getCommentLink($comment)
        );
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        if ($comment->delete()) {
            flash()->success(__('layout.flash.success'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return back();
    }
}
