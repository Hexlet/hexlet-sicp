<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:access-admin');
    }

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
}
