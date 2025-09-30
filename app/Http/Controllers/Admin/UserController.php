<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:access-admin');
    }

    public function index(): View
    {
        $users = User::withCount(['comments', 'solutions', 'chapterMembers', 'exerciseMembers'])
            ->orderBy('id', 'desc')
            ->paginate(50);

        return view('admin.users', compact('users'));
    }
}
