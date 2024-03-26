<?php

namespace App\Http\Controllers\Chapter;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\ChapterMember;
use App\Models\User;
use Flash;

class ChapterMemberController extends Controller
{
    public function finish(Chapter $chapter)
    {
        $user = auth()->user();
        $currentChapterMember = $this->getMember($user, $chapter);
        $currentChapterMember->finish();
        $currentChapterMember->save();

        // TODO: add points for finishing
        flash()->info(__('layout.flash.success'))->success();

        return back();
    }

    private function getMember(User $user, Chapter $chapter): ChapterMember
    {
        $currentChapterMember = $chapter
            ->members()
            ->whereUserId($user->id)
            ->firstOr(function () use ($chapter, $user): ChapterMember {
                $chapterMember = ChapterMember::make([]);

                $chapterMember->user()->associate($user);
                $chapterMember->chapter()->associate($chapter);

                return $chapterMember;
            });

        return $currentChapterMember;
    }
}
