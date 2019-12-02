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
        return redirect()->route('account.edit', $user->id);
    }

    public function update(User $user)
    {
        $user = Auth::user();
        $this->validate(request(), [
            'name' => 'required|min:2||max:255|unique:users',
        ]);
        $user->name = request('name');
        $user->save();
        flash(__('account.name_updated'))->success();
        return redirect()->route('account.edit', $user->id);
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('account.edit', compact('user'));
    }

    public function destroy(User $user)
    {
        $user = Auth::user();
        $user->delete();
        flash(__('account.your_account_deleted'));
        return redirect()->route('welcome');
    }

    public function delete(User $user)
    {
        $user = Auth::user();
        return view('account.delete', compact('user'));
    }
}
