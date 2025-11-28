<?php

namespace Tests\Feature\Http\Controllers\Admin;

use App\Models\User;
use Tests\ControllerTestCase;

class UserControllerTest extends ControllerTestCase
{
    protected User $adminUser;
    protected User $regularUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adminUser = User::factory()->create(['admin' => true]);
        $this->regularUser = User::factory()->create(['admin' => false]);
    }

    public function testIndexAsAdmin(): void
    {
        $this->actingAs($this->adminUser);

        $response = $this->get(route('admin.users.index'));

        $response->assertOk();
        $response->assertViewIs('admin.users');
        $response->assertViewHas('users');
    }

    public function testIndexAsRegularUserDenied(): void
    {
        $this->withExceptionHandling();
        $this->actingAs($this->regularUser);

        $response = $this->get(route('admin.users.index'));

        $response->assertStatus(403);
    }

    public function testIndexAsGuestDenied(): void
    {
        $this->withExceptionHandling();
        $response = $this->get(route('admin.users.index'));

        $response->assertStatus(403);
    }
}
