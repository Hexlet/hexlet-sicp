<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SaveChapterRequest;
use App\User;

class UserChapterController extends Controller
{
    public function store(SaveChapterRequest $request, User $user)
    {
        //TODO Добавить guard, авторизованный польтзователь может изменять только свой список глав
        $user->chapters()->sync($request->get('chapters_id', []));

        return redirect(route('profile'));
    }
}
