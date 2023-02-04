@php
/**
* @var \App\Models\User $user
* @var ExerciseMembers[]
*/
@endphp

@if($chapter->children->count())
<{{ getChapterHeaderTag($chapter) }} class="mt-3">
    {{ App\Helpers\ChapterHelper::fullChapterName($chapter->path) }}
</{{ getChapterHeaderTag($chapter) }}>
@foreach($chapter->children as $subChapter)
@include('partials.chapter_form_element', ['chapter' => $chapters->find($subChapter->id)])
@endforeach
@else
<div class="form-check m-2 border-bottom">
    <input type="checkbox" name="chapters_id[]" id="subChapter{{ $chapter->id }}" value="{{ $chapter->id }}"
        class="form-check-input" @checked($user->haveRead($chapter))
    >
    <label for="subChapter{{ $chapter->id }}" class="form-check-label">
        {{ App\Helpers\ChapterHelper::fullChapterName($chapter->path) }}
    </label>
    @if ($chapter->exercises->isNotEmpty())
    <ul class="list-unstyled">
        @foreach($chapter->exercises as $exercise)
        <li>
            @if ($exerciseMembers->get($exercise->id))
                @if ($exerciseMembers->get($exercise->id)->isStarted())
                <i class="bi bi-hourglass-split"></i>
                @endif
                @if ($exerciseMembers->get($exercise->id)->isFinished())
                <i class="bi bi-check-circle"></i>
                @endif
            @endif
            <a href="{{ route('exercises.show', [$exercise]) }}" class="link-dark">
                {{ $exercise->getFullTitle() }}
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</div>
@endif
