<?php

namespace App\Http\Controllers\Chapter;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\ChapterMember;
use App\Models\User;
use App\Services\ActivityService;
use DB;
use Illuminate\Http\RedirectResponse;

class ChapterMemberController extends Controller
{
    public function finish(Chapter $chapter, ActivityService $activityService): RedirectResponse
    {
        $user = auth()->user();
        $currentChapterMember = $this->getMember($user, $chapter);
        $currentChapterMember->finish();
        $currentChapterMember->save();
        $user->increment('points');

        flash()->info(__('layout.flash.success'))->success();
        $activityService->logChapterMemberFinished($currentChapterMember);

        return back();
    }

    private function getMember(User $user, Chapter $chapter): ChapterMember
    {
        $currentChapterMember = $chapter
            ->members()
            ->whereUserId($user->id)
            ->firstOr(function () use ($chapter, $user): ChapterMember {
                $chapterMember = new ChapterMember([]);

                $chapterMember->user()->associate($user);
                $chapterMember->chapter()->associate($chapter);

                return $chapterMember;
            });

        return $currentChapterMember;
    }
}
