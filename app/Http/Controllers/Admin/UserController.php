<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends AdminController
{
    public function index(Request $request): View
    {
        $users = QueryBuilder::for(User::class)
            ->allowedFilters([
                AllowedFilter::partial('name'),
                AllowedFilter::partial('email'),
            ])
            ->latest()
            ->paginate(50)
            ->appends($request->query());

        return view('admin.users', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'github_name' => 'nullable|string|max:255',
        ]);

        $user->update($data);
        $user->admin = $request->has('admin');
        $user->save();

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated');
    }
}
