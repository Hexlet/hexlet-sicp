<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SaveChapterRequest;
use App\User;

class UserChapterController extends Controller
{
    public function store(SaveChapterRequest $request, User $user)
    {
        //TODO Добавить guard, авторизованный польтзователь может изменять только свой список глав
        $newCompletedChapters = collect($request->get('chapters_id', []));
        $currentCompletedChapters = $user->chapters()->pluck('chapter_id');

        $chaptersToCreate = $newCompletedChapters->diff($currentCompletedChapters);
        $chaptersToDelete = $currentCompletedChapters->diff($newCompletedChapters);

        $user->chapters()->detach($chaptersToDelete);
        foreach ($chaptersToCreate as $chapterId) {
            $userReadChapter = $user->readChapters()->make([
                'chapter_id' => $chapterId
            ]);

            $userReadChapter->save();
        }

        return redirect(route('my'));
    }
}
