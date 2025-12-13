<?php

namespace App\Services;

use App\DTO\CommentData;
use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Exercise;
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
            'parent_id' => $parent?->id,
        ]);

        $comment->commentable()->associate($commentable);
        $comment->user()->associate($user);
        $comment->save();

        return $comment;
    }

    public function update(Comment $comment, CommentData $data): Comment
    {
        $commentable = $this->resolveCommentable($data);
        $parent = $this->resolveParent($data, $commentable);

        $comment->fill([
            'content' => $data->content,
            'parent_id' => $parent?->id,
        ]);

        $comment->commentable()->associate($commentable);
        $comment->save();

        return $comment;
    }

    private function resolveCommentable(CommentData $data): Model
    {
        $type = $data->commentable_type instanceof Optional ? null : $data->commentable_type;
        $id = $data->commentable_id instanceof Optional ? null : $data->commentable_id;

        if (!$type || !$id) {
            throw ValidationException::withMessages([
                'commentable_type' => __('validation.custom.commentable_type.required'),
                'commentable_id' => __('validation.custom.commentable_id.required'),
            ]);
        }

        if (!in_array($type, [Chapter::class, Exercise::class], true)) {
            throw ValidationException::withMessages([
                'commentable_type' => __('validation.custom.commentable_type.in'),
            ]);
        }

        $model = $type::find($id);

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

        if (
            $parent->commentable_type !== $commentable::class
            || $parent->commentable_id !== $commentable->getKey()
        ) {
            throw ValidationException::withMessages([
                'parent_id' => __('validation.custom.parent_id.different_discussion'),
            ]);
        }

        return $parent;
    }
}
