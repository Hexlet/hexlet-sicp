@php
  /**
   * @var \Illuminate\Support\Collection|\App\Models\Chapter[] $chapters
   * @var \App\Models\Chapter $chapter
   */
@endphp
<div class="list-group list-group-flush">
  @foreach ($chapters[$parent] as $chapter)
    <div class="list-group-item">
      <a href="{{ route('chapters.show', $chapter) }}">
        {{ App\Helpers\ChapterHelper::fullChapterName($chapter->path) }}
      </a>
      <br>
      @if ($chapter->exercises->isNotEmpty())
        <a data-bs-toggle="collapse" href="#collapse{{ $chapter->id }}" aria-expanded="false"
          aria-controls="collapse{{ $chapter->id }}">
          <small>{{ __('exercise.show.exercises') }}</small>
        </a>
        <ul class="collapse list-unstyled" id="collapse{{ $chapter->id }}">
          @foreach ($chapter->exercises as $exercise)
            <li>
              <i class="bi bi-keyboard-fill icon-lg"></i>
              <a href="{{ route('exercises.show', [$exercise]) }}">
                {{ $exercise->getFullTitle() }}
              </a>
            </li>
          @endforeach
        </ul>
      @endif
      @includeWhen(isset($chapters[$chapter->id]), 'chapter.list', [
          'chapters' => $chapters,
          'parent' => $chapter->id,
      ])
    </div>
  @endforeach
</div>
