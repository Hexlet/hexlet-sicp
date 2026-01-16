<?php

namespace App\Http\Controllers\Settings;

use App\Enums\SyncDirection;
use App\Enums\SyncType;
use App\Http\Controllers\Controller;
use App\Jobs\CreateGithubRepositoryJob;
use App\Jobs\SetupGithubRepositoryJob;
use App\Jobs\SyncSolutionsJob;
use App\Models\GithubRepository;
use App\States\GithubRepository\GithubRepositoryState;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Bus;
use Inertia\Response;
use Log;

class GithubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Response
    {
        $user = Auth::user();
        $repository = $user->githubRepository;

        return $this->inertia([
            'user' => array_merge($user->toArray(), [
                'has_github_token' => !empty($user->github_access_token),
            ]),
            'repository' => $repository,
            'processingStates' => GithubRepositoryState::getProcessingStates(),
        ]);
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

        Bus::chain([
            new CreateGithubRepositoryJob($user->id),
            (new SetupGithubRepositoryJob($user->id))->delay(now()->addSeconds(5)),
            new SyncSolutionsJob($user->id, SyncDirection::ToGithub, SyncType::Initial),
        ])->catch(function (\Throwable $e) use ($user) {
            Log::channel('github')->error('GitHub repository setup chain failed', [
                'user_id' => $user->id,
                'error' => $e->getMessage(),
            ]);
        })->dispatch();

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

        SyncSolutionsJob::dispatch($user->id);

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
