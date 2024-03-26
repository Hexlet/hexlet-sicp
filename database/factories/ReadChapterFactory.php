<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\ChapterMember;
use App\Models\User;
use App\Services\ActivityService;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<ChapterMember> */
class ChapterMemberFactory extends Factory
{
    protected $model = ChapterMember::class;

    public function definition(): array
    {
        return [
            'user_id' => null,
            'chapter_id' => null,
        ];
    }

    public function user(User $user): self
    {
        return $this->state(fn() => [
            'user_id' => $user->id,
        ]);
    }

    public function chapter(Chapter $chapter): self
    {
        return $this->state(fn() => [
            'chapter_id' => $chapter->id,
        ]);
    }

    public function configure(): self
    {
        return $this->afterCreating(function (ChapterMember $chapterMember) {
            /** @var ActivityService $service */
            // TODO: add logging
            // $service = app()->make(ActivityService::class);
            // $service->logChangedUserChapters(
            //     $chapterMember->user,
            //     collect($chapterMember->chapter->path),
            //     collect()
            // );
        });
    }
}
