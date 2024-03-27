<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\ChapterMember;
use App\Models\User;
use Illuminate\View\View;

class ChapterController extends Controller
{
    public function index(): View
    {
        $chapters = Chapter::with('exercises')->get()->groupBy('parent_id');

        return view('chapter.index', compact('chapters'));
    }

    public function show(Chapter $chapter): View
    {
        $chapter->load([
            'parent',
            'children',
            'exercises',
            'comments',
        ]);

        /**
         * @var User $authUser
         */
        $authUser = auth()->user() ?? new User();
        $previousChapter = Chapter::whereId($chapter->id - 1)->firstOrNew([]);
        $nextChapter = Chapter::whereId($chapter->id + 1)->firstOrNew([]);
        $currentChapterMember = $chapter
            ->members()
            ->whereUserId($authUser->id)->firstOr(function () use ($chapter, $authUser): ChapterMember {
                $chapterMember = new ChapterMember([]);

                $chapterMember->user()->associate($authUser);
                $chapterMember->chapter()->associate($chapter);

                return $chapterMember;
            });

        return view('chapter.show', compact(
            'currentChapterMember',
            'chapter',
            'authUser',
            'previousChapter',
            'nextChapter',
        ));
    }
}
