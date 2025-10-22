<?php

namespace App\Http\Controllers\Settings;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request): View
    {
        if (auth()->user()->is_admin && $request->has('user_id')) {
            $user = User::findOrFail($request->input('user_id'));
        } else {
            $user = auth()->user();
        }

        return view('settings.profile.index', compact('user'));
    }

    public function update(Request $request): RedirectResponse
    {
        /** @var User $user */
        if (auth()->user()->is_admin && $request->has('user_id')) {
            $user = User::findOrFail($request->input('user_id'));
        } else {
            $user = Auth::user();
        }

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
            'hexlet_nickname' => [
                'nullable',
                'min:2',
                'max:255',
                Rule::unique('users')->ignore($user),
            ],
        ]);
        $user->name = $request->get('name');
        $user->github_name = $request->get('github_name');
        $user->hexlet_nickname = $request->get('hexlet_nickname');

        if (auth()->user()->is_admin) {
            $user->is_admin = $request->input('is_admin') === '1';
        }

        if ($user->save()) {
            flash()->success(__('account.account_updated'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        if (auth()->user()->is_admin && $request->has('user_id')) {
            return redirect()->route('settings.profile.index', ['user_id' => $user->id]);
        } else {
            return redirect()->route('settings.profile.index');
        }
    }
}
