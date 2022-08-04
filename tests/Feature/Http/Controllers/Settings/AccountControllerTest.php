<?php

namespace Tests\Feature\Http\Controllers\Settings;

use App\Models\User;
use Tests\ControllerTestCase;

class AccountControllerTest extends ControllerTestCase
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
        $response = $this->delete(route('settings.account.destroy', $this->user));
        $response->assertRedirect();
        $this->assertGuest();

        $this->assertNull(User::find($this->user->id));
    }
}
