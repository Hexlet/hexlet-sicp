<?php

namespace Tests\Feature\Http\Controllers\User;

use App\Solution;
use Illuminate\Support\Collection;
use Tests\ControllerTestCase;

class SolutionControllerTest extends ControllerTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->actingAs($this->user)
            ->get('/');
    }

    public function testStore(): void
    {
        $factoryData = factory(Solution::class)->make([
            'user_id' => $this->user->id,
        ])->toArray();
        $data = array_only($factoryData, ['exercise_id', 'user_id', 'content']);
        $response = $this->post(route('users.solutions.store', $this->user), $data);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('solutions', $data);
    }

    public function testShow(): void
    {
        /** @var Collection $solutions */
        $solutions = $this->user->solutions()->saveMany(
            factory(Solution::class, 5)
            ->make()
        );

        $solution = $solutions->first();

        $response = $this->get(route('users.solutions.show', [$this->user, $solution]));

        $response->assertOk();
    }

    public function testDestroy(): void
    {
        $solution = factory(Solution::class)->create([
            'user_id' => $this->user->id,
        ]);
        $response = $this->delete(route('users.solutions.destroy', [$this->user, $solution]));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('solutions', ['id' => $solution->id]);
    }
}
