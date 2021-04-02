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
            <strong class="text-dark">{{ $chapter->path }}</strong>
            {{ getChapterName($chapter->path) }}
        </a>
        <br>
        @if($chapter->exercises->isNotEmpty())
        <a data-toggle="collapse"
           href="#collapse{{ $chapter->id }}"
           aria-expanded="false"
           aria-controls="collapse{{ $chapter->id }}">
            <small>{{ __('exercise.show.exercises') }}</small>
        </a>
        <ul class="collapse list-group" id="collapse{{ $chapter->id }}">
            @foreach($chapter->exercises as $exercise)
            <li class="list-group-item p-1">
                <i class="fas fa-dumbbell"></i>
                <a href="{{ route('exercises.show', [$exercise]) }}">
                    {{ getFullExerciseTitle($exercise) }}
                </a>
            </li>
            @endforeach
        </ul>
        @endif
        @includeWhen(isset($chapters[$chapter->id]), 'chapter.list', ['chapters' => $chapters, 'parent' => $chapter->id])
    </div>
    @endforeach
</div>
