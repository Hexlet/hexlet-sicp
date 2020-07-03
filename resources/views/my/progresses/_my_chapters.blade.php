<div class="row row-cols-1 row-cols-md-2 no-gutters border border-top-0">
    <div class="col col-md-4 border-right">
        <div class="nav nav-pills flex-column sticky-top m-2 pt-2" role="tablist">
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
    <div class="col col-md-8">
            {!! Form::open()->route('users.chapters.store', [$user]) !!}
            <div class="tab-content m-2 m-lg-4">
                @foreach($mainChapters as $mainChapter)
                <div
                    class="tab-pane {{ $mainChapter->path === '1' ? 'active' : '' }}"
                    id="subChapters{{ $mainChapter->id }}"
                    role="tabpanel"
                    aria-labelledby="subChapters{{ $mainChapter->id }}-tab">
                    @include('partials.chapter_form_element', ['chapter' => $mainChapter])
                </div>
                @endforeach
                <div class="text-right mt-2 mt-lg-4">
                    {!! Form::submit(__('layout.common.save')) !!}
                </div>
            </div>
            {!! Form::close() !!}
    </div>
</div>
