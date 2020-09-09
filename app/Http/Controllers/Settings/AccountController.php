<?php

namespace App\Http\Controllers\Settings;

use App\User;
use Auth;
use App\Http\Controllers\Controller;
use GrahamCampbell\GitHub\GitHubManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AccountController extends Controller
{
    private GitHubManager $gitHubManager;

    public function __construct(GitHubManager $gitHubManager)
    {

        $this->middleware('auth');
        $this->gitHubManager = $gitHubManager;
    }

    public function index(): View
    {
        /** @var User $user */
        $user = Auth::user();
        $githubRepositories = collect($this->fetchUserRepositories('fey'))
            ->pluck('full_name', 'name');

        return view('settings.account.index', compact('user', 'githubRepositories'));
    }

    public function destroy(): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user->delete()) {
            flash()->success(__('account.your_account_deleted'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        Auth::logout();

        return redirect()->route('index');
    }

    private function fetchUserRepositories($username): array
    {
        return $this->gitHubManager->user()
            ->repositories($username, 'owner', 'full_name', 'asc', 'all', 'owner');
    }
}
