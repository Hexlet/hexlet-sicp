<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Chapter;
use App\Models\Comment;
use App\Models\Exercise;
use App\Models\User;
use Database\Seeders\ChaptersTableSeeder;
use Database\Seeders\ExercisesTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Illuminate\Database\Eloquent\Model;
use Tests\ControllerTestCase;

class CommentControllerTest extends ControllerTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->seed([
            ChaptersTableSeeder::class,
            ExercisesTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }

    /**
     * @dataProvider dataCommentable
     */
    public function testShow(string $commentableClass): void
    {
        $this->actingAs($this->user);
        $commentable = $commentableClass::inRandomOrder()->first();
        $comment = $this->createComment($this->user, $commentable);
        $route = route('comments.show', $comment);

        $response = $this->get($route);
        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    /**
     * @dataProvider dataCommentable
     */
    public function testStore(string $commentableClass): void
    {
        /** @var Exercise|Chapter $commentableClass */
        $commentable = $commentableClass::first();
        $commentablePath = $this->getModelActionRoute('show', $commentable);
        $user = $this->user;
        $this
            ->from($commentablePath)
            ->actingAs($user);

        $commentData = [
            'content' => $this->faker->text,
            'user_id' => $user->id,
            'commentable_id' => $commentable->id,
            'commentable_type' => $commentable::class,
        ];
        $response = $this->post(route('comments.store'), $commentData);
        $response->assertSessionDoesntHaveErrors();

        // https://github.com/laravel/framework/issues/30467
        $comment = Comment::where($commentData)->first();

        $response->assertRedirect($this->buildCommentRoutePath($commentablePath, $comment));

        $this->assertDatabaseHas('comments', $commentData);
    }

    /**
     * @dataProvider dataCommentable
     */
    public function testUpdate(string $commentableClass): void
    {
        /** @var Exercise|Chapter $commentableClass */
        $commentable = $commentableClass::first();
        $commentablePath = $this->getModelActionRoute('show', $commentable);
        $user = $this->user;
        $this
            ->from($commentablePath)
            ->actingAs($user);

        $comment = $this->createComment($user, $commentable);

        $commentData = [
            'content' => $this->faker->text,
            'user_id' => $user->id,
            'commentable_id' => $commentable->id,
            'commentable_type' => $commentable::class,
        ];
        $response = $this->put(
            route('comments.update', ['comment' => $comment]),
            $commentData
        );

        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect($this->buildCommentRoutePath($commentablePath, $comment));

        $this->assertDatabaseHas('comments', array_merge($commentData, ['id' => $comment->id]));
    }

    /**
     * @dataProvider dataCommentable
     */
    public function testDestroy(string $commentableClass): void
    {
        /** @var Model $commentableClass */
        $commentable = $commentableClass::inRandomOrder()->first();
        $commentablePath = $this->getModelActionRoute('show', $commentable);
        $user = $this->user;
        $this
            ->from($commentablePath)
            ->actingAs($user);

        /** @var Comment $comment */
        $comment = $this->createComment($user, $commentable);

        $commentData = $comment->only('id', 'user_id', 'content', 'deleted_at');

        $this->assertDatabaseHas('comments', $commentData);
        $response = $this->delete(
            route('comments.destroy', compact('comment'))
        );

        $response->assertRedirect($commentablePath);
        $response->assertSessionDoesntHaveErrors();

        $this->assertDatabaseMissing('comments', $commentData);
    }

    public function dataCommentable(): array
    {
        return [
            'test with chapter'  => [Chapter::class],
            'test with exercise' => [Exercise::class],
        ];
    }

    private function getModelActionRoute(string $action, Model $model): string
    {
        $routesGroup = $model->getTable();
        return route("{$routesGroup}.{$action}", [
            str_singular($routesGroup) => $model,
        ]);
    }

    private function createComment(User $user, Model $commentable): Comment
    {
        /** @var Comment $comment */
        $comment = Comment::factory()->make();

        $comment->user()->associate($user);
        $comment->commentable()->associate($commentable);
        $comment->save();

        return $comment;
    }

    private function buildCommentRoutePath(string $path, Comment $comment): string
    {
        return "{$path}#comment-{$comment->id}";
    }
}
