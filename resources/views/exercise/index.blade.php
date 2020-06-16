@extends('layouts.app')
@php
/**
 * @var \Illuminate\Support\Collection|\Illuminate\Support\Collection[] $exercisesGroups
 * @var \Illuminate\Support\Collection|\App\Exercise[] $exercises
 */
@endphp
@section('content')
    <div class="row">
        <div class="col">
            <h3>{{ __('layout.nav.exercises') }}</h3>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-12 col-md-4 mb-2">
            <ul class="nav nav-pills flex-column sticky-top x-z-index-0" role="tablist">
                @foreach($exercisesGroups->keys() as $rootChapterPath)
                    <li class="nav-item">
                        <a class="nav-link {{ $rootChapterPath === 1 ? 'active' : '' }}"
                            id="subChapters{{ $rootChapterPath }}-tab"
                            href="#subChapters{{ $rootChapterPath }}" data-toggle="tab" role="tab"
                            aria-controls="subChapters{{ $rootChapterPath }}"
                            aria-selected="{{ $rootChapterPath === '1' ? 'true' : 'false' }}">
                            {{ $rootChapterPath }}. {{ getChapterName($rootChapterPath) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-12 col-md-8">
            <div class="card pl-2 pr-3">
                <div class="tab-content">
                @foreach($exercisesGroups as $rootChapterPath => $exercises)
                    <div class="tab-pane card-body {{ $rootChapterPath === 1 ? 'active' : '' }}"
                        id="subChapters{{ $rootChapterPath }}" role="tabpanel"
                        aria-labelledby="subChapters{{ $rootChapterPath }}-tab">
                        <ul class="list-unstyled">
                        @foreach($exercises as $exercise)
                            <li>
                                <a title="{{ __('exercise.exercise') }} {{ $exercise->path }}"
                                    href="{{ route('exercises.show', $exercise) }}">
                                    {{ $exercise->path }} {{ getExerciseTitle($exercise) }}
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
