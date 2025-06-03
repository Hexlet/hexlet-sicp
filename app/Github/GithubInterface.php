<?php

namespace App\Github;
use Github\Api\Gists;
interface GithubInterface
{
    public function gists(): Gists;
}
