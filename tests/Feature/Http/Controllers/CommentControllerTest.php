<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\Comment;
use App\Exercise;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Model;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        factory(Chapter::class, 2)
            ->create()
            ->each(
                function (Chapter $chapter) {
                    $chapter->exercises()->saveMany(
                        factory(Exercise::class, mt_rand(1, 3))->make()
                    );
                }
            );
    }

    /**
     * @dataProvider dataCommentable
     */
    public function testStoreChapter(string $commentableClass): void
    {
        /** @var Model $commentableClass */
        $commentable = $commentableClass::inRandomOrder()->first();
        $visitedPage = $this->getCommentableActionRoute('show', $commentable);
        $user = $this->user;
        $this
            ->from($visitedPage)
            ->actingAs($user);

        $commentData = [
            'content' => $this->faker->text,
            'user_id' => $user->id,
            'commentable_id' => $commentable->id,
            'commentable_type' => get_class($commentable),
        ];
        $response = $this->post(route('comments.store'), $commentData);

        $response->assertRedirect(sprintf("%s#comment-1", $visitedPage));
        $this->assertDatabaseHas('comments', $commentData);
        $this->get($visitedPage)->assertSee($commentData['content']);
    }

    /**
     * @dataProvider dataCommentable
     */
    public function testUpdate(string $commentableClass): void
    {
        /** @var Model $commentableClass */
        $commentable = $commentableClass::inRandomOrder()->first();
        $visitedPage = $this->getCommentableActionRoute('show', $commentable);
        $user = $this->user;
        $this
            ->from($visitedPage)
            ->actingAs($user);

        $comment = $this->createComment($user, $commentable);

        $commentData = [
            'content' => $this->faker->text,
            'user_id' => $user->id,
            'commentable_id' => $commentable->id,
            'commentable_type' => get_class($commentable),
        ];
        $response = $this->put(
            route('comments.update', compact('comment')),
            $commentData
        );
        $response->assertSessionDoesntHaveErrors();
        $response->assertRedirect(sprintf("%s#comment-%s", $visitedPage, $comment->id));
        $this->get($visitedPage)->assertSee($commentData['content']);

        $this->assertDatabaseHas('comments', array_merge($commentData, ['id' => $comment->id]));
    }

    /**
     * @dataProvider dataCommentable
     */
    public function testDestroy(string $commentableClass): void
    {
        /** @var Model $commentableClass */
        $commentable = $commentableClass::inRandomOrder()->first();
        $visitedPage = $this->getCommentableActionRoute('show', $commentable);
        $user = $this->user;
        $this
            ->from($visitedPage)
            ->actingAs($user);

        /** @var Comment $comment */
        $comment = $this->createComment($user, $commentable);

        $commentData = $comment->only('id', 'user_id', 'content', 'deleted_at');

        $this->assertDatabaseHas('comments', $commentData);
        $response = $this->delete(
            route('comments.destroy', compact('comment'))
        );

        $response->assertRedirect($visitedPage);
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseMissing('comments', $commentData);
        $this->get($visitedPage)->assertDontSee($commentData['content']);
    }

    /**
     * @dataProvider dataCommentable
     */
    public function testUpdateByOtherUser(string $commentableClass): void
    {
        /** @var Model $commentableClass */
        $commentable = $commentableClass::inRandomOrder()->first();
        $visitedPage = $this->getCommentableActionRoute('show', $commentable);
        $user = $this->user;
        $this
            ->from($visitedPage)
            ->actingAs($user);

        $comment = factory(Comment::class)->state('with_user')->make();
        $commentable->comments()->save($comment);
        $commentData = $comment->only('id', 'user_id', 'content', 'deleted_at');

        $this->expectException(AuthorizationException::class);
        $response = $this->put(
            route('comments.update', compact('comment'))
        );
        $response->assertForbidden();

        $this->assertDatabaseHas('comments', $commentData);
        $this->get($visitedPage)->assertSee($commentData['content']);
    }

    /**
     * @dataProvider dataCommentable
     */
    public function testDestroyByOtherUser(string $commentableClass): void
    {
        /** @var Model $commentableClass */
        $commentable = $commentableClass::inRandomOrder()->first();
        $visitedPage = $this->getCommentableActionRoute('show', $commentable);
        $user = $this->user;
        $this
            ->from($visitedPage)
            ->actingAs($user);

        $comment = factory(Comment::class)->state('with_user')->make();
        $commentable->comments()->save($comment);

        $this->expectException(AuthorizationException::class);
        $response = $this->delete(
            route('comments.destroy', compact('comment'))
        );
        $commentData = $comment->only('id', 'user_id', 'content', 'deleted_at');

        $response->assertForbidden();
        $this->assertDatabaseHas('comments', $commentData);
        $this->get($visitedPage)->assertSee($commentData['content']);
    }

    public function dataCommentable(): array
    {
        return [
            'test with chapter'  => [Chapter::class, 'chapters', 'chapter'],
            'test with exercise' => [Exercise::class, 'exercises', 'exercise'],
        ];
    }

    private function getCommentableActionRoute(string $action, Model $model): string
    {
        $routesGroup = $model->getTable();
        return route("{$routesGroup}.{$action}", [
            str_singular($routesGroup) => $model
        ]);
    }

    private function createComment(User $user, Model $commentable): Comment
    {
        $comment = factory(Comment::class)->make();
        $comment = $comment->user()->associate($user);
        /** @var Comment $comment */
        $comment = $comment->commentable()->associate($commentable);
        $comment->save();

        return $comment;
    }
}
