<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SolutionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:access-admin');
    }

    public function index(Request $request): View
    {
        $solutions = QueryBuilder::for(Solution::class)
            ->allowedFilters([
                AllowedFilter::exact('user_id'),
            ])
            ->with(['user', 'exercise'])
            ->latest()
            ->paginate(50)
            ->appends($request->query());

        $userId = $request->input('filter.user_id');
        $user = $userId ? User::find($userId) : null;

        return view('admin.solutions', compact('solutions', 'user'));
    }
}
