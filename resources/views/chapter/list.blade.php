@php
/**
 * @var \Illuminate\Support\Collection|\App\Chapter[] $chapters
 * @var \App\Chapter $chapter
 */
@endphp
<ol>
    @foreach ($chapters[$parent] as $chapter)
    <li>
        <abbr >
            <a title="{{ $chapter->path }} {{ getChapterName($chapter->path) }}"
               href="{{ route('chapters.show', $chapter) }}">
                {{ getChapterName($chapter->path) }}
            </a>
        </abbr>
        @if($chapter->exercises->isNotEmpty())
        <div>
            <button
                class="btn btn-info btn-sm"
                type="button"
                data-toggle="collapse"
                data-target="#collapse{{ $chapter->id }}"
                aria-expanded="false"
                aria-controls="collapse{{ $chapter->id }}">{{ __('exercise.exercises') }}
            </button>
        </div>
        <div class="collapse" id="collapse{{ $chapter->id }}">
            @foreach($chapter->exercises as $exercise)
            <a class="dropdown-item" href="{{ route('exercises.show', [$exercise]) }}">
                {{ $exercise->path }} {{ getExerciseTitle($exercise) }}
            </a>
            @endforeach
        </div>
        @endIf
        @includeWhen(isset($chapters[$chapter->id]), 'chapter.list', ['chapters' => $chapters, 'parent' => $chapter->id])
    </li>
    @endforeach
</ol>
