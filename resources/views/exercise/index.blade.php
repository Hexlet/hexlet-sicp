@extends('layouts.app')
@php
  /**
   * @var \Illuminate\Support\Collection|\Illuminate\Support\Collection[] $exercisesGroups
   * @var \Illuminate\Support\Collection|\App\Models\Exercise[] $exercises
   */
@endphp
@section('description')
  {{ __('exercise.index.description') }}
@endsection
@section('content')
  @include('exercise.navigation')

  <h1 class="h3">{{ __('layout.nav.exercises') }}</h1>

  <div class="row mt-2">
    <div class="col-12 col-md-4 mb-2">
      <ul class="nav nav-pills flex-column sticky-top x-z-index-0" role="tablist">
        @foreach ($exercisesGroups->keys() as $rootChapterPath)
          <li class="nav-item">
            <a @class(['nav-link', 'active' => $rootChapterPath === 1]) id="subChapters{{ $rootChapterPath }}-tab"
              href="#subChapters{{ $rootChapterPath }}" data-bs-toggle="tab" role="tab"
              aria-controls="subChapters{{ $rootChapterPath }}"
              aria-selected="{{ $rootChapterPath === '1' ? 'true' : 'false' }}">
              {{ App\Helpers\ChapterHelper::fullChapterName($rootChapterPath) }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>
    <div class="col-12 col-md-8">
      <div class="card pl-2 pr-3">
        <div class="tab-content">
          @foreach ($exercisesGroups as $rootChapterPath => $exercises)
            <div @class(['tab-pane', 'card-body', 'active' => $rootChapterPath === 1]) id="subChapters{{ $rootChapterPath }}" role="tabpanel"
              aria-labelledby="subChapters{{ $rootChapterPath }}-tab">
              <ul class="list-unstyled">
                @foreach ($exercises as $exercise)
                  <li>
                    <a title="{{ __('exercise.exercise') }} {{ $exercise->path }}"
                      href="{{ route('exercises.show', $exercise) }}">
                      {{ $exercise->getFullTitle() }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection
