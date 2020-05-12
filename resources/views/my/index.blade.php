@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h3>{{ __('layout.nav.my_progress') }}</h3>
    </div>
    <div class="col text-right">
        <h5><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></h5>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12 col-md-4 mb-2">
        <div class="nav nav-pills flex-column sticky-top x-z-index-0" role="tablist">
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
    <div class="col-12 col-md-8">
        <div class="card pl-2 pr-3">
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
                    {!! Form::submit(__('Save')) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
