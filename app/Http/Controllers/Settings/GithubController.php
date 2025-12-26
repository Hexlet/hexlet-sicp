<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Jobs\CreateGithubRepositoryJob;
use App\Jobs\SyncSolutionsToGithubJob;
use App\Models\GithubRepository;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GithubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $user = Auth::user();
        $repository = $user->githubRepository;

        return view('settings.github.index', compact('user', 'repository'));
    }

    public function store(): RedirectResponse
    {
        $user = Auth::user();

        if (!$user->github_access_token) {
            flash()->error(__('account.github.no_token'));
            return redirect()->route('settings.github.index');
        }

        if ($user->githubRepository) {
            flash()->error(__('account.github.already_exists'));
            return redirect()->route('settings.github.index');
        }

        CreateGithubRepositoryJob::dispatch($user->id);

        flash()->success(__('account.github.creating'));

        return redirect()->route('settings.github.index');
    }

    public function sync(): RedirectResponse
    {
        $user = Auth::user();

        if (!$user->githubRepository) {
            flash()->error(__('account.github.no_repository'));
            return redirect()->route('settings.github.index');
        }

        SyncSolutionsToGithubJob::dispatch($user->id);

        flash()->success(__('account.github.syncing'));

        return redirect()->route('settings.github.index');
    }

    public function destroy(GithubRepository $github): RedirectResponse
    {
        $user = Auth::user();

        abort_if($github->user_id !== $user->id, 403);

        try {
            $github->delete();
            flash()->success(__('account.github.deleted'));
        } catch (\Exception $e) {
            flash()->error(__('account.github.delete_failed', ['error' => $e->getMessage()]));
        }

        return redirect()->route('settings.github.index');
    }
}
