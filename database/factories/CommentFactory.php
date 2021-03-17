<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\Comment;
use App\Models\User;
use App\Services\ActivityService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->text,
            'user_id' => null,
        ];
    }

    public function configure(): self
    {
        return $this->afterCreating(function (Comment $comment) {
            /** @var ActivityService $service */
            $service = app()->make(ActivityService::class);
            $service->logCreatedComment($comment->user, $comment, $comment->commentable);
        });
    }

    public function user(User $user): self
    {
        return $this->state(fn() => [
            'user_id' => $user->id,
        ]);
    }

    public function commentable(Model $commentable): self
    {
        return $this->state(fn() => [
            'commentable_id' => optional($commentable)->id,
            'commentable_type' => get_class($commentable),
        ]);
    }
}
