<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\Http\Requests\User\SaveChapterRequest;
use App\User;

class UserChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(SaveChapterRequest $request, User $user)
    {
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
        flash()->success(__('layout.flash.success'));

        return redirect()->back();
    }

    public function destroy(User $user, Chapter $chapter)
    {
        $user->chapters()->detach($chapter);

        activity()
            ->performedOn($user)
            ->causedBy($user)
            ->withProperties(
                ['chapters' => [$chapter->path], 'count' => 1, 'url' => route('users.show', $user)]
            )->log('removed');
        flash()->success(__('layout.flash.success'));

        return redirect()->back();
    }
}
