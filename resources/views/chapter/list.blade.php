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
        <p>
            @foreach($chapter->exercises as $exercise)
            <a title="{{ __('exercise.exercise') }} {{ $exercise->path }}"
               href="{{ route('exercises.show', $exercise) }}">
                {{ $exercise->path }}
            </a>
            @endforeach
        </p>
        @endIf
        @includeWhen(isset($chapters[$chapter->id]), 'chapter.list', ['chapters' => $chapters, 'parent' => $chapter->id])
    </li>
    @endforeach
</ol>
