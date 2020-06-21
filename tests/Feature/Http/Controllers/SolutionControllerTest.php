<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Solution;
use App\Exercise;
use App\User;

class SolutionControllerTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();

        $this->actingAs($this->user)
            ->withSession(['foo' => 'bar'])
            ->get('/');
    }

    public function testStore()
    {
        $factoryData = factory(Solution::class)->make([
            'user_id' => $this->user->id
        ])->toArray();
        $data = \Arr::only($factoryData, ['exercise_id', 'user_id', 'content']);
        $response = $this->post(route('solutions.store'), $data);
        
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseHas('solutions', $data);
    }

    public function testDestroy()
    {
        $solution = factory(Solution::class)->create([
            'user_id' => $this->user->id
        ]);
        $response = $this->delete(route('solutions.destroy', $solution));
        $response->assertSessionHasNoErrors();
        $response->assertRedirect();

        $this->assertDatabaseMissing('solutions', ['id' => $solution->id]);
    }
}
