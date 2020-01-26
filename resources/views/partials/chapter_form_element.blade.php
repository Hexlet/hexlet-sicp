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
</div>
@endif
