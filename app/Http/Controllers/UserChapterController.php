<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SaveChapterRequest;
use App\User;

class UserChapterController extends Controller
{
    public function store(SaveChapterRequest $request, User $user)
    {
        //TODO Добавить guard, авторизованный польтзователь может изменять только свой список глав
        $completeChapters = $request->get('chapters_id', []);
        $user->chapters()->detach();
        foreach ($completeChapters as $chapterId) {
            $user->readChapters()->create([
                'chapter_id' => $chapterId
            ]);
        }

        return redirect(route('my'));
    }
}
