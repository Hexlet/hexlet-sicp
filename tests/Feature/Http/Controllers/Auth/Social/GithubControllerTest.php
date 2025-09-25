<?php

namespace Tests\Feature\Http\Controllers\Auth\Social;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Laravel\Socialite\Two\GithubProvider;
use Laravel\Socialite\Two\InvalidStateException;
use Laravel\Socialite\Two\User as SocialiteUser;
use Tests\TestCase;

class GithubControllerTest extends TestCase
{
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
        $this->stubSocialiteFacade($email, $name, $nickname, $token, random_int(1, 100));
        $githubCallback = route('oauth.github-callback');
        $this->get($githubCallback)->assertLocation(route('my.index'));

        $this->assertDatabaseHas('users', ['email' => $email]);
    }

    public function testUserDeleteAndLogin(): void
    {
        $name  = $this->faker->name;
        $nickname = $this->faker->name;
        $token = $this->faker->randomAscii;
        $email = $this->faker->email;
        $this->stubSocialiteFacade($email, $name, $nickname, $token, random_int(1, 100));
        $githubCallback = route('oauth.github-callback');
        $this->get($githubCallback)->assertLocation(route('my.index'));

        $user = User::where('email', $email)->firstOrFail();
        $this->assertDatabaseHas('users', ['email' => $email]);

        $response = $this->delete(route('settings.account.destroy', $user));
        $response->assertRedirect();

        $user2 = User::find($user->id);
        $this->assertNull($user2);

        $this->stubSocialiteFacade($email, $name, $nickname, $token, random_int(1, 100));
        $githubCallback = route('oauth.github-callback');
        $this->get($githubCallback)->assertLocation(route('my.index'));

        $this->assertDatabaseHas('users', ['email' => $email]);
    }

    public function testCreateEmptyUserNameAndLogin(): void
    {
        $name  = '';
        $nickname = $this->faker->name;
        $token = $this->faker->randomAscii;
        $email = $this->faker->email;

        $this->stubSocialiteFacade($email, $name, $nickname, $token, random_int(1, 100));
        $githubCallback = route('oauth.github-callback');
        $this->get($githubCallback)->assertLocation(route('my.index'));

        $this->assertDatabaseHas('users', [ 'email' => $email, 'name' => $nickname ]);
    }

    public function testTwoFactorAuthResponseWithInvalidState(): void
    {
        $provider = $this->createMock(GithubProvider::class);
        $provider->method('user')->willThrowException(new InvalidStateException());

        $stub = $this->createMock(Socialite::class);
        $stub->method('driver')->willReturn($provider);

        $this->app->instance(Socialite::class, $stub);

        $githubCallback = route('oauth.github-callback');
        $this->get($githubCallback)->assertRedirect();
    }

    private function stubSocialiteFacade(
        string $email,
        string $name,
        string $nickname,
        string $token,
        int $id
    ): void {
        $user = new SocialiteUser();
        $user->token = $token;
        $user->name  = $name;
        $user->nickname = $nickname;
        $user->id    = $id;
        $user->email = $email;

        $provider = $this->createMock(GithubProvider::class);
        $provider->method('user')->willReturn($user);

        $stub = $this->createMock(Socialite::class);
        $stub->method('driver')->willReturn($provider);

        $this->app->instance(Socialite::class, $stub);
    }
}
