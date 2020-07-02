
<div class="d-flex border border-top-0 flex-wrap">
    <div class="flex-grow-1 flex-lg-grow-0 flex-shrink-0 border-right">
        <div class="nav nav-pills flex-column sticky-top x-z-index-0 m-2 pt-2" role="tablist">
            @foreach($mainChapters as $mainChapter)
            <a class="nav-item nav-link {{ $mainChapter->path === '1' ? 'active' : '' }}"
               id="subChapters{{ $mainChapter->id }}-tab"
               href="#subChapters{{ $mainChapter->id }}"
               data-toggle="tab"
               role="tab"
               aria-controls="subChapters{{ $mainChapter->id }}"
               aria-selected="{{ $mainChapter->path === '1' ? 'true' : 'false' }}">
                {{ $mainChapter->path }} {{ getChapterName($mainChapter->path) }}
            </a>
            @endforeach
        </div>
    </div>
    <div class="flex-grow-1 flex-shrink-1">
            {!! Form::open()->route('users.chapters.store', [$user]) !!}
            <div class="tab-content m-4">
                @foreach($mainChapters as $mainChapter)
                <div
                    class="tab-pane {{ $mainChapter->path === '1' ? 'active' : '' }}"
                    id="subChapters{{ $mainChapter->id }}"
                    role="tabpanel"
                    aria-labelledby="subChapters{{ $mainChapter->id }}-tab">
                    @include('partials.chapter_form_element', ['chapter' => $mainChapter])
                </div>
                @endforeach
                <div class="text-right">
                    {!! Form::submit(__('layout.common.save')) !!}
                </div>
            </div>
            {!! Form::close() !!}
    </div>
</div>
