<?php

namespace App\Http\Controllers\Settings;

use App\Models\User;
use Auth;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        /** @var User $user */
        $user = Auth::user();

        return view('settings.account.index', compact('user'));
    }

    public function destroy(): RedirectResponse
    {
        DB::transaction(function () {
            /** @var User $user */
            $user = Auth::user();

            if ($user->delete()) {
                flash()->success(__('account.your_account_deleted'));
                Auth::logout();
            } else {
                flash()->error(__('layout.flash.error'));
            }
        });

        return redirect()->route('home');
    }
}
