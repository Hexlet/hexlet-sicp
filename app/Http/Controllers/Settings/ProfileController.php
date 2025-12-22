<?php

namespace App\Http\Controllers\Settings;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\Rule;
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

    public function update(Request $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        $this->validate($request, [
            'name' => [
                'required',
                'min:2',
                'max:255',
            ],
            'github_name' => [
                'nullable',
                'min:2',
                'max:255',
                Rule::unique('users')->ignore($user),
            ],
        ]);
        $user->name = $request->get('name');
        $user->github_name = $request->get('github_name');

        $flash = $user->save()
            ? ['success' => __('account.account_updated')]
            : ['error' => __('layout.flash.error')];

        return redirect()->route('settings.profile.index')->with($flash);
    }
}
