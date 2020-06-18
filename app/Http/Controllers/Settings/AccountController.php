<?php

namespace App\Http\Controllers\Settings;

use App\User;
use Auth;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        return view('settings.account.index', compact('user'));
    }

    public function destroy()
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
}
