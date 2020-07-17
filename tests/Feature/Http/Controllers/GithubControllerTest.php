<?php

namespace Tests\Feature\Http\Controllers;

use App\User as AppUser;
use Illuminate\Http\RedirectResponse;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Laravel\Socialite\Two\User;

class GithubControllerTest extends TestCase
{
    public function mockSocialiteFacade(string $email, string $name, string $nickname, string $token, int $id): void
    {
        $user = new User();
        $user->token = $token;
        $user->name  = $name;
        $user->nickname = $nickname;
        $user->id    = $id;
        $user->email = $email;

        $provider = $this->createMock(\Laravel\Socialite\Two\GithubProvider::class);
        $provider->method('user')->willReturn($user);

        $stub = $this->createMock(Socialite::class);
        $stub->method('driver')->willReturn($provider);

        $this->app->instance(Socialite::class, $stub);
    }
    public function testRedirectToGithub(): void
    {
        /** @var RedirectResponse $response */
        $response = $this->call('GET', '/oauth/github');

        $this->assertStringContainsString('github.com/login/oauth', $response->getTargetUrl());
    }

    public function testCreateUserAndLogin(): void
    {
        $name  = $this->faker->name;
        $nickname = $this->faker->name;
        $token = $this->faker->randomAscii;
        $email = $this->faker->email;
        $this->mockSocialiteFacade($email, $name, $nickname, $token, random_int(1, 100));
        $githubCallback = route('oauth.github-callback');
        $this->get($githubCallback)->assertLocation(route('my'));

        $user = AppUser::where('email', $email)->firstOrFail();
        $this->assertDatabaseHas('users', ['email' => $email]);
    }

    public function testUserDeleteAndLogin(): void
    {
        $name  = $this->faker->name;
        $nickname = $this->faker->name;
        $token = $this->faker->randomAscii;
        $email = $this->faker->email;
        $this->mockSocialiteFacade($email, $name, $nickname, $token, random_int(1, 100));
        $githubCallback = route('oauth.github-callback');
        $this->get($githubCallback)->assertLocation(route('my'));

        $user = AppUser::where('email', $email)->firstOrFail();
        $this->assertDatabaseHas('users', ['email' => $email]);

        $response = $this->delete(route('settings.account.destroy', $user));
        $response->assertRedirect();

        $user2 = AppUser::find($user->id);
        $this->assertNull($user2);

        $this->mockSocialiteFacade($email, $name, $nickname, $token, random_int(1, 100));
        $githubCallback = route('oauth.github-callback');
        $this->get($githubCallback)->assertLocation(route('my'));

        $this->assertDatabaseHas('users', ['email' => $email]);
    }

    public function testCreateEmptyUserNameAndLogin(): void
    {
        $name  = '';
        $nickname = $this->faker->name;
        $token = $this->faker->randomAscii;
        $email = $this->faker->email;

        $this->mockSocialiteFacade($email, $name, $nickname, $token, random_int(1, 100));
        $githubCallback = route('oauth.github-callback');
        $this->get($githubCallback)->assertLocation(route('my'));

        $this->assertDatabaseHas('users', [ 'email' => $email, 'name' => $nickname ]);
    }
}
