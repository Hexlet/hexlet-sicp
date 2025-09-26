<?php

namespace Tests\Feature\Http\Controllers\Auth\Social;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\InvalidStateException;
use Laravel\Socialite\Two\User as SocialiteUser;
use Tests\TestCase;

class YandexControllerTest extends TestCase
{
    public function testRedirectToYandex(): void
    {
        /** @var RedirectResponse $response */
        $response = $this->call('GET', '/oauth/yandex');

        $this->assertStringContainsString('oauth.yandex.ru', $response->getTargetUrl());
    }

    public function testCreateUserAndLogin(): void
    {
        $name  = $this->faker->name;
        $nickname = $this->faker->userName;
        $token = $this->faker->sha1;
        $email = $this->faker->safeEmail;

        $this->stubSocialiteFacade($email, $name, $nickname, $token, random_int(1, 100));

        $callback = route('oauth.yandex-callback');
        $this->get($callback)->assertLocation(route('my'));

        $this->assertDatabaseHas('users', ['email' => $email]);
    }

    public function testUserDeleteAndLogin(): void
    {
        $name  = $this->faker->name;
        $nickname = $this->faker->userName;
        $token = $this->faker->sha1;
        $email = $this->faker->safeEmail;

        $this->stubSocialiteFacade($email, $name, $nickname, $token, random_int(1, 100));

        $callback = route('oauth.yandex-callback');
        $this->get($callback)->assertLocation(route('my'));

        $user = User::where('email', $email)->firstOrFail();
        $this->assertDatabaseHas('users', ['email' => $email]);

        $response = $this->delete(route('settings.account.destroy', $user));
        $response->assertRedirect();

        $this->assertNull(User::find($user->id));

        // Авторизация снова
        $this->stubSocialiteFacade($email, $name, $nickname, $token, random_int(1, 100));
        $this->get($callback)->assertLocation(route('my'));

        $this->assertDatabaseHas('users', ['email' => $email]);
    }

    public function testCreateEmptyUserNameAndLogin(): void
    {
        $name  = '';
        $nickname = $this->faker->userName;
        $token = $this->faker->sha1;
        $email = $this->faker->safeEmail;

        $this->stubSocialiteFacade($email, $name, $nickname, $token, random_int(1, 100));

        $callback = route('oauth.yandex-callback');
        $this->get($callback)->assertLocation(route('my'));

        $this->assertDatabaseHas('users', [
            'email' => $email,
            'name'  => $nickname,
        ]);
    }

    public function testTwoFactorAuthResponseWithInvalidState(): void
    {
        $provider = $this->createMock(AbstractProvider::class);
        $provider->method('user')->willThrowException(new InvalidStateException());

        $stub = $this->createMock(Socialite::class);
        $stub->method('driver')->willReturn($provider);

        $this->app->instance(Socialite::class, $stub);

        $callback = route('oauth.yandex-callback');
        $this->get($callback)->assertRedirect();
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
        $user->name = $name;
        $user->nickname = $nickname;
        $user->id = $id;
        $user->email = $email;

        $provider = $this->createMock(AbstractProvider::class);
        $provider->method('user')->willReturn($user);

        $stub = $this->createMock(Socialite::class);
        $stub->method('driver')->willReturn($provider);

        $this->app->instance(Socialite::class, $stub);
    }
}
