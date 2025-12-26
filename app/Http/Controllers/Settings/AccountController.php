<?php

namespace App\Http\Controllers\Settings;

use App\Models\User;
use Auth;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Response
    {
        /** @var User $user */
        $user = Auth::user();

        return $this->inertia([
            'user' => $user,
        ]);
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
