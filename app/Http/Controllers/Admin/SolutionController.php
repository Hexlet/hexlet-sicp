<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SolutionController extends Controller
{
    public function index(Request $request): View
    {
        $query = Solution::with(['user', 'exercise']);

        $userId = $request->get('user_id');
        $user = User::find($userId);

        if (!empty($userId)) {
            $query->where('user_id', $userId);
        }

        $solutions = $query->orderBy('created_at', 'desc')->paginate(50);

        return view('admin.solutions', compact('solutions', 'user'));
    }
}
