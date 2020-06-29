
<div class="d-flex border border-top-0">
    <div class="col-12 col-md-4 my-4 border-right">
        <div class="nav nav-pills flex-column sticky-top x-z-index-0 mt-2" role="tablist">
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
    <div class="col-12 col-md-8 mt-2">
        <div class="pl-2 pr-3">
            {!! Form::open()->route('users.chapters.store', [$user]) !!}
            <div class="tab-content">
                @foreach($mainChapters as $mainChapter)
                <div
                    class="tab-pane card-body {{ $mainChapter->path === '1' ? 'active' : '' }}"
                    id="subChapters{{ $mainChapter->id }}"
                    role="tabpanel"
                    aria-labelledby="subChapters{{ $mainChapter->id }}-tab">
                    @include('partials.chapter_form_element', ['chapter' => $mainChapter])
                </div>
                @endforeach
                <div class="form-group text-right">
                    {!! Form::submit(__('layout.common.save')) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
