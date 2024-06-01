@php
  /**
   * @var \App\Models\User $user
   * @var ExerciseMembers[]
   */
@endphp

@if ($chapter->children->isNotEmpty())
  <{{ getChapterHeaderTag($chapter) }} class="mt-3">
  {{ App\Helpers\ChapterHelper::fullChapterName($chapter->path) }}
  </{{ getChapterHeaderTag($chapter) }}>
  <ul class="list-group">
    @foreach ($chapter->children as $subChapter)
      @include('partials.chapter_partial', ['chapter' => $chapters->find($subChapter->id)])
    @endforeach
  </ul>
@else
  <li class="list-group-item">
    <a for="subChapter{{ $chapter->id }}" href="{{ route('chapters.show', $chapter) }}" class="text">
      {{ App\Helpers\ChapterHelper::fullChapterName($chapter->path) }}
    </a>
    @if(optional($chapterMembers->get($chapter->id))->isFinished())
      <i class="bi bi-check-lg text-success"></i>
    @endif
    @if ($chapter->exercises->isNotEmpty())
      <ul class="ms-2 list-unstyled">
        @foreach ($chapter->exercises as $exercise)
          <li>
            <a href="{{ route('exercises.show', $exercise) }}" class="link-secondary">
              {{ $exercise->getFullTitle() }}
            </a>

            @if ($exerciseMembers->get($exercise->id)?->isStarted())
              <i class="bi bi-clock-history"></i>
            @endif
            @if ($exerciseMembers->get($exercise->id)?->isFinished())
              <i class="bi bi-check-lg text-success"></i>
            @endif
          </li>
        @endforeach
      </ul>
  </li>
@endif
@endif
