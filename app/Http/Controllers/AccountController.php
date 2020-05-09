<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

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

        return redirect()->route('account.edit', $user->id);
    }

    public function update(User $user)
    {
        /** @var User $user */
        $user = Auth::user();
        $this->validate(request(), [
            'name' => 'required|min:2||max:255|unique:users',
        ]);
        $user->name = request('name');

        if ($user->save()) {
            flash()->success(__('account.name_updated'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return redirect()->route('account.edit', $user->id);
    }

    public function edit()
    {
        /** @var User $user */
        $user = Auth::user();

        return view('account.edit', compact('user'));
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

    public function delete()
    {
        /** @var User $user */
        $user = Auth::user();

        return view('account.delete', compact('user'));
    }
}
