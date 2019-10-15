<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SaveChapterRequest;
use App\User;

class UserChapterController extends Controller
{
    public function store(SaveChapterRequest $request, User $user)
    {
        //TODO Добавить guard, авторизованный польтзователь может изменять только свой список глав
        $completeChapters = collect($request->get('chapters_id', []));
        $userChapters = $user->chapters()->pluck('chapter_id');

        $chaptersToCreate = $completeChapters->diff($userChapters);
        $chaptersToDelete = $userChapters->diff($completeChapters);


        $user->chapters()->detach($chaptersToDelete);
        foreach ($chaptersToCreate as $chapterId) {
            $user->readChapters()->create([
                'chapter_id' => $chapterId
            ]);
        }

        return redirect(route('my'));
    }
}
