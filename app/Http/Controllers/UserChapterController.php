<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SaveChapterRequest;
use App\User;

class UserChapterController extends Controller
{
    public function store(SaveChapterRequest $request, User $user)
    {
        //TODO Добавить guard, авторизованный польтзователь может изменять только свой список глав
        $userChaptersOld = $user->chapters()->pluck('path');
        $user->chapters()->sync($request->get('chapters_id', []));
        $userChaptersNew = $user->chapters()->pluck('path');

        [$log, $chapters] = getDiffChapters($userChaptersOld, $userChaptersNew);

        if ($log) {
            activity()
                ->performedOn($user)
                ->causedBy($user)
                ->withProperties(
                    ['chapters' => $chapters, 'count' => count($chapters), 'url' => route('users.show', $user)]
                )
                ->log($log);
        }

        return redirect(route('my'));
    }
}
