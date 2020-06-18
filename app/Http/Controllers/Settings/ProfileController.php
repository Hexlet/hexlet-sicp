<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();

        return view('settings.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $this->validate($request, [
            'name' => 'required|min:2||max:255|unique:users',
        ]);
        $user->name = $request->get('name');

        if ($user->save()) {
            flash()->success(__('account.name_updated'));
        } else {
            flash()->error(__('layout.flash.error'));
        }

        return redirect()->route('settings.profile.index', $user);
    }
}
