<?php

namespace App\Github;

use GrahamCampbell\GitHub\GitHubManager;
use \Github\Api\Gists;

class Github implements GithubInterface
{
    private $githubManager;

    public function __construct(GitHubManager $githubManager)
    {
        $this->githubManager = $githubManager;
    }

    public function gists(): Gists
    {
        return $this->githubManager->gists();
    }
}
