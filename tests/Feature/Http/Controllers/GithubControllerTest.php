<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Socialite\Contracts\Factory as Socialite;
use Laravel\Socialite\Two\User;

class GithubControllerTest extends TestCase
{
    use WithFaker;

    public function mockSocialiteFacade($email, $name, $token, $id)
    {
        $user = new User();
        $user->token = $token;
        $user->name  = $name;
        $user->id    = $id;
        $user->email = $email;

        $provider = $this->createMock(\Laravel\Socialite\Two\GithubProvider::class);
        $provider->method('user')->willReturn($user);

        $stub = $this->createMock(Socialite::class);
        $stub->method('driver')->willReturn($provider);

        $this->app->instance(Socialite::class, $stub);
    }
    public function testRedirectToGithub()
    {
        $response = $this->call('GET', '/oauth/github');

        $this->assertContains('github.com/login/oauth', $response->getTargetUrl());
    }

    public function testCreateUserAndLogin()
    {
        $name  = $this->faker->name;
        $token = $this->faker->randomAscii;
        $email = $this->faker->email;
        $this->mockSocialiteFacade($email, $name, $token, random_int(1, 100));

        $this->json('GET', '/oauth/github/callback')->assertLocation('/home');

        $this->assertDatabaseHas('users', ['email' => $email]);
    }
}
