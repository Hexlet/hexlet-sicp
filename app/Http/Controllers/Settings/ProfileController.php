<?php

namespace App\Http\Controllers\Settings;

use App\DTO\Settings\ProfileUpdateData;
use App\Models\User;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Response
    {
        $user = auth()->user();

        return $this->inertia([
            'user' => $user,
            'profileImage' => $user->present()->getProfileImageLink(),
        ]);
    }

    public function update(ProfileUpdateData $data): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        $user->name = $data->name;
        $user->github_name = $data->github_name;

        if ($user->save()) {
            flash()->success(__('account.account_updated'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return redirect()->route('settings.profile.index');
    }
}
