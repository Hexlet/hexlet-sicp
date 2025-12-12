<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\DTO\CommentData;
use App\Models\Activity;
use App\Models\User;
use App\Services\ActivityService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function index(): View
    {
        $comments = Comment::with('user')->latest()->paginate(15);

        return view('comment.index', compact('comments'));
    }

    /**
     * @var ActivityService
     */
    private ActivityService $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->authorizeResource(Comment::class, 'comment');
        $this->activityService = $activityService;
    }

    public function store(CommentData $data): RedirectResponse
    {
        /** @var User $user */
        $user = auth()->user();

        /** @var Comment $comment */
        $comment = $user->comments()->save(
            new Comment($data->toArray())
        );

        $this->activityService->logCreatedComment($user, $comment);

        return redirect($comment->present()->getLink());
    }

    public function update(CommentData $data, Comment $comment): RedirectResponse
    {
        $comment->fill($data->toArray());

        if ($comment->save()) {
            flash()->success(__('layout.flash.success'));
            $this->activityService->updateCreatedCommentActivity($comment);
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return redirect($comment->present()->getLink());
    }

    public function show(Comment $comment): RedirectResponse
    {
        return redirect(
            $comment->present()->getLink()
        );
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        Activity::whereSubjectId($comment->id)
            ->whereSubjectType($comment::class)
            ->delete();

        if ($comment->delete()) {
            flash()->success(__('layout.flash.success'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return back();
    }
}
