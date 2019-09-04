<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Socialite\Contracts\Factory as Socialite;

class GithubControllerTest extends TestCase
{
    public function mockSocialiteFacade($email = 'foo@bar.com', $name = 'foo', $token = 'foo', $id = 1)
    {
        $socialiteUser = $this->createMock(\Laravel\Socialite\Two\User::class);
        $socialiteUser->expects($this->any())
            ->method('getEmail')
            ->willReturn($email);
        $socialiteUser
            ->expects($this->any())
            ->method('getName')
            ->willReturn($name);
        $socialiteUser->token = $token;
        $socialiteUser->name  = $name;
        $socialiteUser->id    = $id;
        $socialiteUser->email = $email;

        $provider = $this->createMock(\Laravel\Socialite\Two\GithubProvider::class);
        $provider->expects($this->any())
                 ->method('user')
                 ->willReturn($socialiteUser);

        $stub = $this->createMock(Socialite::class);
        $stub->expects($this->any())
             ->method('driver')
             ->willReturn($provider);

        // Replace Socialite Instance with our mock
        $this->app->instance(Socialite::class, $stub);
    }
    public function testRedirectToGithub()
    {
        $response = $this->call('GET', '/oauth/github');

        $this->assertContains('github.com/login/oauth', $response->getTargetUrl());
    }

    public function testCreateUserAndLogin()
    {
        $this->mockSocialiteFacade('foo@bar.com');

        $this->json('GET', '/oauth/github/callback')
            ->assertLocation('/home');

        $this->assertDatabaseHas('users', [
            'email' => 'foo@bar.com',
        ]);
    }
}
