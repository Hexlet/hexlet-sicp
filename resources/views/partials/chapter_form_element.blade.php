@php
/**
 * @var \App\User $user
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
    <div>
        @foreach($chapter->exercises as $exercise)
            {!! Form::open()->route('users.exercises.store', [$user])->formInline() !!}
            <span>
                @if($completedExercises->has($exercise->id))
                <a href="{{ route('users.exercises.destroy', [$user, $exercise]) }}"
                   class="text-decoration-none"
                   data-toggle="tooltip"
                   data-placement="bottom"
                   title="{{ __('exercise.remove_completed_exercise', ['exercise_path' => $exercise->path]) }}"
                   data-confirm="{{ __('exercise.remove_completed_exercise', ['exercise_path' => $exercise->path]) }}?"
                   data-method="delete">
                    <i class="fa fa-check-square text-success"></i>
                </a>
                @else
                <a href="{{ route('users.exercises.update', [$user, $exercise]) }}"
                   class="text-decoration-none"
                   data-toggle="tooltip"
                   data-placement="bottom"
                   title="{{ __('exercise.mark_exercise', ['exercise_path' => $exercise->path]) }}"
                   data-method="patch">
                    <i class="far fa-square text-secondary"></i>
                </a>
                @endif
            </span>
        @endforeach
    </div>
</div>
@endif
