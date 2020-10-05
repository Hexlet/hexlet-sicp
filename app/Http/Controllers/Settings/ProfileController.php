<?php

namespace App\Http\Controllers\Settings;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
use Illuminate\View\View;
use App\Http\Requests\Settings\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $user = auth()->user();

        return view('settings.profile.index', compact('user'));
    }

    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = Auth::user();
        $user->name = $request->get('name');

        if ($user->save()) {
            flash()->success(__('account.name_updated'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return redirect()->route('settings.profile.index', $user);
    }
}
