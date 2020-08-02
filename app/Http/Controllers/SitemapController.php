<?php

namespace App\Http\Controllers;

use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(GitHubManager $github): Response
    {
        $gistId = config('sitemap.gist_id');
        $gist = $github->gists()->show($gistId);
        $sitemap = $gist['files']['sitemap.xml'];
        return response($sitemap['content'], 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
