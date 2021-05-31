<?php

namespace App\Http\Controllers\Api\Exercise;

use App\Http\Controllers\Controller;
use App\Models\Exercise;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function store(Exercise $exercise, Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users',
            'solution_code' => 'required|string'
        ]);

        $user = User::findOrFail($data['user_id']);
        $solutionCode = $data['solution_code'];

        return [
            'output' => '',
            'status_code' => '',
            'result' => ''
        ];
    }
}
