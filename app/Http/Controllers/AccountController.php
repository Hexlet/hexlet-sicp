<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('account.index', compact('user'));
    }

    public function destroy(User $user)
    {
        $user = Auth::user();
        $user->delete();
        flash(__('account.your_account_deleted'));
        return redirect()->route('welcome');
    }
}
