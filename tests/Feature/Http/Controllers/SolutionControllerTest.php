<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Solution;
use App\Exercise;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Model;

class SolutionControllerTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();

        $this->actingAs($this->user)
            ->get('/');
    }

    public function testStore()
    {
        $factoryData = factory(Solution::class)->make([
            'user_id' => $this->user->id
        ])->toArray();
        $data = \Arr::only($factoryData, ['exercise_id', 'user_id', 'content']);
        $response = $this->post(route('users.solutions.store', $this->user), $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('solutions', $data);
    }

    public function testShow()
    {
        $solutions = $this->user->solutions()->saveMany(
            factory(Solution::class, 5)
            ->make()
        );

        $solution = $solutions->first();

        $response = $this->get(route('users.solutions.show', [$this->user, $solution]));

        $response->assertOk();
    }

    public function testDestroy()
    {
        $solution = factory(Solution::class)->create([
            'user_id' => $this->user->id
        ]);
        $response = $this->delete(route('users.solutions.destroy', [$this->user, $solution]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('solutions', ['id' => $solution->id]);
    }
}
