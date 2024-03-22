<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SaveChapterRequest;
use App\Models\Chapter;
use App\Models\ChapterMember;
use App\Models\User;
use App\Services\ActivityService;
use Illuminate\Http\RedirectResponse;

class UserChapterController extends Controller
{
    private ActivityService $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->middleware('auth');
        $this->activityService = $activityService;
    }

    public function store(SaveChapterRequest $request, User $user): RedirectResponse
    {
        $userChaptersOld = $user->chapters()->pluck('path');
        $user->chapters()->sync($request->get('chapters_id', []));
        $userChaptersNew = $user->chapters()->pluck('path');

        $chaptersMembers = $user->chapterMembers()->whereIn('id', $user->chapters()->pluck('chapter_members.id'));

        $chaptersMembers->each(function (ChapterMember $chapterMember) {
            $chapterMember->finish();
            $chapterMember->save();
        });

        $this->activityService->logChangedUserChapters(
            $user,
            $userChaptersOld,
            $userChaptersNew
        );

        flash()->success(__('layout.flash.success'));

        return redirect()->route('my');
    }
}
