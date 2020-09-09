<?php

namespace App\Http\Controllers;

use App\GithubAccount;
use App\User;
use Illuminate\Http\Request;

class GithubAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, User $user)
    {
        return redirect()->route('oauth.github');
    }

    public function update(Request $request, User $user, GithubAccount $githubAccount)
    {
        $this->validate($request, [
            'repository_name' => 'required|string|nullable',
        ]);

        $githubAccount->repository_name = $request->repository_name;

        $githubAccount->save();

        return back();
    }

    public function destroy(User $user, GithubAccount $githubAccount)
    {
        $githubAccount->delete();

        redirect()->back();
    }
}
