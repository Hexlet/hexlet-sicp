<?php

namespace App\Http\Controllers;

use App\User;

class UserChapterController extends Controller
{
    public function store(User $user)
    {
        $this->updateUserReadChapters($user, request('chapters_id'));

        return response()->json('Successfully updated', 200);
    }

    private function updateUserReadChapters(User $user, $chaptersId)
    {
        $user->readChapters()->delete();

        foreach ($chaptersId as $chapterId) {
            $user->readChapters()->create([
                'chapter_id' => $chapterId,
            ]);
        }
    }
}
