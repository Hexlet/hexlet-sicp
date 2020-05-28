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
            <strong class="text-dark">{{ $chapter->path }}</strong>
            {{ getChapterName($chapter->path) }}
        </a>
        @if($chapter->exercises->isNotEmpty())
        <a class="float-right"
           data-toggle="collapse"
           href="#collapse{{ $chapter->id }}"
           aria-expanded="false"
           aria-controls="collapse{{ $chapter->id }}">
            <small>{{ __('exercise.show.exercises') }}</small>
            <span class="badge badge-info text-light">{{ count($chapter->exercises) }}</span>
        </a>
        <ul class="collapse list-group" id="collapse{{ $chapter->id }}">
            @foreach($chapter->exercises as $exercise)
            <li class="list-group-item p-1">
                <i class="fas fa-dumbbell"></i>
                <a href="{{ route('exercises.show', [$exercise]) }}">
                    {{ $exercise->path }} {{ getExerciseTitle($exercise) }}
                </a>
            </li>
            @endforeach
        </ul>
        @endif
        @includeWhen(isset($chapters[$chapter->id]), 'chapter.list', ['chapters' => $chapters, 'parent' => $chapter->id])
    </div>
    @endforeach
</div>
