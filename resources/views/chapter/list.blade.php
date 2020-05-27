@php
/**
 * @var \Illuminate\Support\Collection|\App\Chapter[] $chapters
 * @var \App\Chapter $chapter
 */
@endphp
<ul type="circle">
    @foreach ($chapters[$parent] as $chapter)
    <li>
        <a href="{{ route('chapters.show', $chapter) }}">
            {{ $chapter->path }} {{ getChapterName($chapter->path) }}
        </a>
        @if($chapter->exercises->isNotEmpty())
        <div>
            <a class="badge badge-primary text-wrap"
               data-toggle="collapse"
               href="#collapse{{ $chapter->id }}"
               aria-expanded="false"
               aria-controls="collapse{{ $chapter->id }}">
                {{ __('exercise.exercises') }} <i class="far fa-caret-square-down"></i>
            </a>
        </div>
        <div class="collapse" id="collapse{{ $chapter->id }}">
            @foreach($chapter->exercises as $exercise)
            <div class="collapse-item">
                <a href="{{ route('exercises.show', [$exercise]) }}">
                    {{ $exercise->path }} {{ getExerciseTitle($exercise) }}
                </a>
            </div>
            @endforeach
        </div>
        @endIf
        @includeWhen(isset($chapters[$chapter->id]), 'chapter.list', ['chapters' => $chapters, 'parent' => $chapter->id])
    </li>
    @endforeach
</ul>
