<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Выводим профиль автризованного пользователя.
     *
     * @return Factory|View
     */
    public function show()
    {
        return view('profile.show', [
            'user' => Auth::user(),
        ]);
    }
}
