<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use App\Models\User;
use App\Services\ActivityService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

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
        /** @var User $user */
        $user = auth()->user();

        /** @var Comment $comment */
        $comment = $user->comments()->save(
            new Comment($request->validated())
        );

        $this->activityService->logCreatedComment($user, $comment);

        return redirect($comment->present()->getLink());
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
        if ($comment->delete()) {
            flash()->success(__('layout.flash.success'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return back();
    }
}
