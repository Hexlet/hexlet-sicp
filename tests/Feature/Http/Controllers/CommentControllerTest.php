<?php

namespace Tests\Feature\Http\Controllers;

use App\Chapter;
use App\Comment;
use App\Exercise;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @property-read User $user
 */
class CommentControllerTest extends TestCase
{
    use WithFaker;

    private $user;

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
     * @param string $commentableClass
     * @param string $commentableRoutesGroup
     * @param string $commentableName
     */
    public function testStoreChapter(string $commentableClass, string $commentableRoutesGroup, string $commentableName)
    {
        $commentable = $commentableClass::inRandomOrder()->first();
        $visitedPage = route($commentableRoutesGroup . '.show', [$commentableName => $commentable]);
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
     * @param string $commentableClass
     * @param string $commentableRoutesGroup
     * @param string $commentableName
     */
    public function testUpdate(string $commentableClass, string $commentableRoutesGroup, string $commentableName)
    {
        $commentable = $commentableClass::inRandomOrder()->first();
        $visitedPage = route($commentableRoutesGroup . '.show', [$commentableName => $commentable]);
        $user = $this->user;
        $this
            ->from($visitedPage)
            ->actingAs($user);

        /** @var Comment $comment */
        $comment = factory(Comment::class)->make();
        $comment
            ->user()->associate($user)
            ->commentable()->associate($commentable)
            ->save();

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
        $this->assertDatabaseHas('comments', array_merge($commentData, ['id' => $comment->id]));

        $response->assertRedirect(sprintf("%s#comment-%s", $visitedPage, $comment->id));
        $this->get($visitedPage)->assertSee($commentData['content']);
    }

    /**
     * @dataProvider dataCommentable
     * @param string $commentableClass
     * @param string $commentableRoutesGroup
     * @param string $commentableName
     */
    public function testDestroy(string $commentableClass, string $commentableRoutesGroup, string $commentableName)
    {
        $commentable = $commentableClass::inRandomOrder()->first();
        $visitedPage = route($commentableRoutesGroup . '.show', [$commentableName => $commentable]);
        $user = $this->user;
        $this
            ->from($visitedPage)
            ->actingAs($user);

        /** @var Comment $comment */
        $comment = factory(Comment::class)->make();
        $comment
            ->user()->associate($user)
            ->commentable()->associate($commentable)
            ->save();

        $commentData = $comment->only('id', 'user_id', 'content', 'deleted_at');

        $this->assertDatabaseHas('comments', $commentData);
        $response = $this->delete(
            route('comments.destroy', compact('comment'))
        );

        $response->assertRedirect($visitedPage);
        $this->assertDatabaseMissing('comments', $commentData);
        $this->get($visitedPage)->assertDontSee($commentData['content']);
    }

    /**
     * @dataProvider dataCommentable
     * @param string $commentableClass
     * @param string $commentableRoutesGroup
     * @param string $commentableName
     */
    public function testUpdateByOtherUser(
        string $commentableClass,
        string $commentableRoutesGroup,
        string $commentableName
    ) {
        $commentable = $commentableClass::inRandomOrder()->first();
        $visitedPage = route($commentableRoutesGroup . '.show', [$commentableName => $commentable]);
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

        $response->assertStatus(401);
        $this->assertDatabaseHas('comments', $commentData);
        $this->get($visitedPage)->assertSee($commentData['content']);
    }

    /**
     * @dataProvider dataCommentable
     * @param string $commentableClass
     * @param string $commentableRoutesGroup
     * @param string $commentableName
     */
    public function testDestroyByOtherUser(
        string $commentableClass,
        string $commentableRoutesGroup,
        string $commentableName
    ) {
        $commentable = $commentableClass::inRandomOrder()->first();
        $visitedPage = route($commentableRoutesGroup . '.show', [$commentableName => $commentable]);
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

        $response->assertStatus(401);
        $this->assertDatabaseHas('comments', $commentData);
        $this->get($visitedPage)->assertSee($commentData['content']);
    }

    public function dataCommentable()
    {
        return [
            'test with chapter'  => [Chapter::class, 'chapters', 'chapter'],
            'test with exercise' => [Exercise::class, 'exercises', 'exercise'],
        ];
    }
}
