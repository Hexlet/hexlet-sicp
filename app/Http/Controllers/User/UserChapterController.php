<?php

namespace App\Http\Controllers\User;

use App\Models\Chapter;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\SaveChapterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(SaveChapterRequest $request, User $user): RedirectResponse
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

    public function destroy(User $user, Chapter $chapter): RedirectResponse
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
