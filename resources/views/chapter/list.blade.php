@php
/**
 * @var \Illuminate\Support\Collection|\App\Chapter[] $chapters
 * @var \App\Chapter $chapter
 */
@endphp
<div class="list-group list-group-flush">
    @foreach ($chapters[$parent] as $chapter)
    <div class="list-group-item">
        <a href="{{ route('chapters.show', $chapter) }}">
            {{ $chapter->path }} {{ getChapterName($chapter->path) }}
        </a>
        @if($chapter->exercises->isNotEmpty())
            <a class="badge badge-primary text-wrap float-right"
               data-toggle="collapse"
               href="#collapse{{ $chapter->id }}"
               aria-expanded="false"
               aria-controls="collapse{{ $chapter->id }}">
                {{ __('exercise.exercises') }}
                <i class="far fa-caret-square-down"></i>
                <span class="badge badge-light">{{ count($chapter->exercises) }}</span>
            </a>
        <div class="collapse" id="collapse{{ $chapter->id }}">
            <ul class="list-group">
                @foreach($chapter->exercises as $exercise)
                <li class="list-group-item p-1">
                    <a class="pl-2" href="{{ route('exercises.show', [$exercise]) }}">
                        {{ $exercise->path }} {{ getExerciseTitle($exercise) }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endIf
        @includeWhen(isset($chapters[$chapter->id]), 'chapter.list', ['chapters' => $chapters, 'parent' => $chapter->id])
    </div>
    @endforeach
</div>
