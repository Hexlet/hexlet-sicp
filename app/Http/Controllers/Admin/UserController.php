<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::withCount(['comments', 'solutions', 'chapterMembers', 'exerciseMembers'])
            ->orderBy('id', 'desc')
            ->paginate(50);

        return view('admin.users', compact('users'));
    }
}
