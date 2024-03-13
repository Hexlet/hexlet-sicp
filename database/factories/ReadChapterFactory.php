<?php

namespace Database\Factories;

use App\Models\Chapter;
use App\Models\ReadChapter;
use App\Models\User;
use App\Services\ActivityService;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<ReadChapter> */
class ReadChapterFactory extends Factory
{
    protected $model = ReadChapter::class;

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
        return $this->afterCreating(function (ReadChapter $readChapter) {
            /** @var ActivityService $service */
            $service = app()->make(ActivityService::class);
            $service->logChangedUserChapters(
                $readChapter->user,
                collect($readChapter->chapter->path),
                collect()
            );
        });
    }
}
