@php
/**
 * @var \App\Models\User $user
 */
@endphp

@if($chapter->children->count())
    <{{ getChapterHeaderTag($chapter) }} class="mt-3">
        {{ $chapter->path }} {{ getChapterName($chapter->path) }}
    </{{ getChapterHeaderTag($chapter) }}>
    @foreach($chapter->children as $subChapter)
    @include('partials.chapter_form_element', ['chapter' => $chapters->find($subChapter->id)])
    @endforeach
@else
<div class="form-check m-2 border-bottom">
    <input type="checkbox" name="chapters_id[]" id="subChapter{{ $chapter->id }}" value="{{ $chapter->id }}"
        class="form-check-input" {{ haveRead($user, $chapter) ? 'checked' : '' }}>
    <label for="subChapter{{ $chapter->id }}" class="form-check-label">
        {{ $chapter->path }} {{ getChapterName($chapter->path) }}
    </label>
    @if ($chapter->exercises->isNotEmpty())
    <div>
        <a data-bs-toggle="collapse"
           href="#collapse{{ $chapter->id }}"
           aria-expanded="false"
           aria-controls="collapse{{ $chapter->id }}">
            {{ __('exercise.show.exercises') }}
        </a>
    </div>
    <div class="collapse" id="collapse{{ $chapter->id }}">
        <ul class="list-unstyled">
        @foreach($chapter->exercises as $exercise)
            <li>
                @if($completedExercises->has($exercise->id))
                <a href="{{ route('users.exercises.destroy', [$user, $exercise]) }}"
                   class="text-decoration-none"
                   data-bs-toggle="tooltip"
                   data-bs-placement="bottom"
                   title="{{ __('exercise.remove_completed_exercise', ['exercise_path' => $exercise->path]) }}"
                   data-confirm="{{ __('exercise.remove_completed_exercise', ['exercise_path' => $exercise->path]) }}?"
                   data-method="delete">
                    <i class="bi bi-check"></i>
                </a>
                @else
                <a href="{{ route('users.exercises.update', [$user, $exercise]) }}"
                   class="text-decoration-none"
                   data-bs-toggle="tooltip"
                   data-bs-placement="bottom"
                   title="{{ __('exercise.mark_exercise', ['exercise_path' => $exercise->path]) }}"
                   data-method="patch">
                    <i class="bi bi-square"></i>
                </a>
                @endif
                <a href="{{ route('exercises.show', [$exercise]) }}"
                   class="link-dark">
                    {{ $exercise->getFullTitle() }}
                </a>
            </li>
        @endforeach
        </ul>
    </div>
    @endif
</div>
@endif
