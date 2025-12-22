<?php

namespace App\Services;

use App\DTO\CommentData;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;
use Spatie\LaravelData\Optional;

final class CommentService
{
    public function create(User $user, CommentData $data): Comment
    {
        $commentable = $this->resolveCommentable($data);
        $parent = $this->resolveParent($data, $commentable);

        $comment = new Comment([
            'content' => $data->content,
        ]);

        $comment->commentable()->associate($commentable);
        $comment->user()->associate($user);

        if ($parent) {
            $comment->parent()->associate($parent);
        }

        $comment->save();

        return $comment;
    }

    public function update(Comment $comment, CommentData $data): Comment
    {
        $commentable = $this->resolveCommentable($data);
        $parent = $this->resolveParent($data, $commentable);

        $comment->fill([
            'content' => $data->content,
        ]);

        $comment->commentable()->associate($commentable);

        if ($parent) {
            $comment->parent()->associate($parent);
        } else {
            $comment->parent()->dissociate();
        }

        $comment->save();

        return $comment;
    }

    private function resolveCommentable(CommentData $data): Model
    {
        $model = $data->commentable_type->value::find($data->commentable_id);

        if (!$model) {
            throw ValidationException::withMessages([
                'commentable_id' => __('validation.custom.commentable_id.exists'),
            ]);
        }

        return $model;
    }

    private function resolveParent(CommentData $data, Model $commentable): ?Comment
    {
        $parentId = $data->parent_id;

        if ($parentId instanceof Optional || $parentId === null) {
            return null;
        }

        $parent = Comment::find($parentId);

        if (!$parent) {
            throw ValidationException::withMessages([
                'parent_id' => __('validation.custom.parent_id.exists'),
            ]);
        }

        if (!$parent->belongsToSameDiscussion($commentable)) {
            throw ValidationException::withMessages([
                'parent_id' => __('validation.comment.parent_id.different_discussion'),
            ]);
        }

        return $parent;
    }
}
