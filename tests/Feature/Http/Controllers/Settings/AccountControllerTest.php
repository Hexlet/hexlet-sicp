<?php

namespace Tests\Feature\Http\Controllers\Settings;

use App\User;
use Tests\TestCaseWithUser;

class AccountControllerTest extends TestCaseWithUser
{

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs($this->user);
    }

    public function testIndex(): void
    {
        $response = $this->get(route('settings.account.index'));
        $response->assertOk();
    }

    public function testDestroy(): void
    {
        $this->actingAs($this->user);
        $this->assertAuthenticatedAs($this->user);
        $response = $this->delete(route('settings.account.destroy', $this->user));
        $response->assertRedirect();
        $this->assertGuest();

        $this->assertNull(User::find($this->user->id));
    }
}
