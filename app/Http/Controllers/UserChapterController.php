<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SaveChapterRequest;
use App\User;
use Auth;
use Spatie\Activitylog\Models\Activity;

class UserChapterController extends Controller
{
    public function store(SaveChapterRequest $request, User $user)
    {
        //TODO Добавить guard, авторизованный польтзователь может изменять только свой список глав
        $userChaptersOld = $user->chapters()->pluck('path');
        $user->chapters()->sync($request->get('chapters_id', []));
        $userChaptersNew = $user->chapters()->pluck('path');

        [$log, $chapters] = getDiffChapters($userChaptersOld, $userChaptersNew);

        activity()
                ->performedOn($user)
                ->causedBy(auth()->user())
                ->withProperties(['chapters' => $chapters])
                ->log($log);

        return redirect(route('my'));
    }
}
