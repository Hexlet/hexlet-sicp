<?php

namespace App\Services\Github;

use App\Exceptions\Github\MissingGithubTokenException;
use App\Models\User;
use Github\Client as GitHubClient;

class GithubClientFactory
{
    public function forUser(User $user): GitHubClient
    {
        if (!$user->github_access_token) {
            throw MissingGithubTokenException::forUser($user->id);
        }

        $client = new GitHubClient();
        $client->authenticate($user->github_access_token, null, GitHubClient::AUTH_ACCESS_TOKEN);

        return $client;
    }
}
