<?php

namespace App\Http\Controllers;

use App\Github\GithubInterface;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(GithubInterface $github): Response
    {
        $gistId = config('sitemap.gist_id');
        $gist = $github->gists()->show($gistId);
        $sitemap = $gist['files']['sitemap.xml'];
        return response($sitemap['content'], 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
