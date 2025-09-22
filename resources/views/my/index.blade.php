@extends('layouts.app')

@section('description')
  {{ __('my.description') }}
@endsection

@section('content')
  <div class="my-4">
    <div class="d-flex flex-wrap justify-content-between">
      <h3>{{ __('layout.nav.my_progress') }}</h3>
      <div class="h5 align-self-center">
        <a class="text-decoration-none" href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
      </div>
    </div>
    <h4>{{ __('progresses.chapters') }} / <a href="{{ route('my.solutions') }}">{{  __('progresses.my_solutions') }}</a></h4>

    <div class="row g-0 border border-top-0">
      <div class="col-12 col-md-4 border-end x-z-index-0">
        <div class="nav nav-pills flex-column sticky-top m-2 pt-2" role="tablist" aria-orientation="vertical">
          @foreach ($mainChapters as $mainChapter)
            <button class="nav-link text-start {{ $mainChapter->path === '1' ? 'active' : '' }}"
                    id="subChapters{{ $mainChapter->id }}-tab" data-bs-target="#subChapters{{ $mainChapter->id }}"
                    data-bs-toggle="tab" type="button" role="tab" aria-controls="subChapters{{ $mainChapter->id }}"
                    aria-selected="{{ $mainChapter->path === '1' ? 'true' : 'false' }}">
              {{ App\Helpers\ChapterHelper::fullChapterName($mainChapter->path) }}
            </button>
          @endforeach
        </div>
      </div>
      <div class="col-12 col-md-8">
        <div class="tab-content m-2 m-lg-4">
          @foreach ($mainChapters as $mainChapter)
            <div class="tab-pane fade {{ $mainChapter->path === '1' ? 'show active' : '' }}"
                 id="subChapters{{ $mainChapter->id }}" role="tabpanel"
                 aria-labelledby="subChapters{{ $mainChapter->id }}-tab">
              @include('partials.chapter_partial', ['chapter' => $mainChapter])
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
