@extends('layouts.app')
@php
    /**
     * @var \App\Models\Exercise $exercise
     * @var \App\Models\Solution $userSolutions
     * @var bool $userCompletedExercise
     * @var \App\Models\User $authUser
     */
@endphp
@section('title'){{ getExerciseTitle($exercise) }} - {{ __('exercise.show.Hexlet SICP') }}@endsection
@section('description'){{ __('exercise.exercise') }} {{ $exercise->path }} {{ getExerciseTitle($exercise) }} {{ __('exercise.show.description') }}@endsection
@section('content')
    {{ Breadcrumbs::render('exercise', $exercise) }}
    <div class="row justify-content-center">
        <div class="sticky-top col-md-12 d-flex justify-content-between">
            @if($previousExercise->exists)
            <a class="mr-auto text-decoration-none" href="{{ route('exercises.show', $previousExercise) }}">
                <i class="fas fa-long-arrow-alt-left"></i>
                @lang('exercise.show.previous')
            </a>
            @endif
            @if($nextExercise->exists)
            <a class="ml-auto text-decoration-none" href="{{ route('exercises.show', $nextExercise) }}">
                @lang('exercise.show.next')
                <i class="fas fa-long-arrow-alt-right"></i>
            </a>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mt-2">
            <div class="card">
                <ul class="justify-content-center flex-shrink-0 nav nav-tabs" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="exercise-description-tab" data-toggle="pill" href="#exercise-description" role="tab" aria-controls="exercise-description" aria-selected="true">{{ __('exercise.show.description-tab') }}</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="exercise-discussion-tab" data-toggle="pill" href="#exercise-discussion" role="tab" aria-controls="exercise-discussion" aria-selected="false">{{ __('exercise.show.discussion-tab') }}</a>
                    </li>
                </ul>
                <div class="tab-content card-body" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="exercise-description" role="tabpanel" aria-labelledby="exercise-description-tab">
                        <h1 class="mb-2 h3">
                            {{ getExerciseTitle($exercise) }}
                            <sup class="h6">
                                <a class="text-muted"
                                   target="_blank"
                                   href="{{ getExerciseOriginLink($exercise) }}"
                                   data-toggle="tooltip"
                                   data-placement="right"
                                   title="{{ __('layout.common.origin') }}">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </sup>
                        </h1>
                        @include(getExerciseListingViewFilepath($exercise))
                        <hr>
                        <div>
                            @auth
                                <div class="d-flex mb-4">
                                    @if($exercise->solutions()->exists())
                                        <a
                                            class="btn btn-secondary mr-1"
                                            href="{{ route('solutions.index', ['filter' => ['exercise_id' => $exercise->id]]) }}"
                                            role="button">
                                            {{ __('views.exercise.show.buttons.show_solutions') }}
                                        </a>
                                    @endif

                                    @if(!$userSolutions->isEmpty())
                                    <a href="{{ route('solutions.index', ['filter' => ['exercise_id' => $exercise->id, 'user_id' => $authUser->id]]) }}" class="mr-1 btn btn-primary btn-light">{{ __('solution.show_solution') }}</a>
                                    @endif
                                    @if($exercise->users->isEmpty())
                                        <p>{{ __('exercise.show.nobody_completed') }}</p>
                                    @else
                                        @include('exercise._modal.completed_by')
                                        <button type="button"
                                                class="btn btn-primary"
                                                data-toggle="modal"
                                                data-target="#modal-completed-by">
                                            {{ __('exercise.show.who_completed') }}
                                        </button>
                                    @endif
                                </div>
                            @endauth
                        </div>
                    </div>
                    <div class="tab-pane fade" id="exercise-discussion" role="tabpanel" aria-labelledby="exercise-discussion-tab">
                        @comments(['model' => $exercise])
                    </div>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-2">
            @if (config('feature.enable_react_editor'))
                <div id="codemirrorContainer"></div>
            @else
                @livewire('exercise-editor', ['exercise' => $exercise, 'user' => $authUser])
            @endif
        </div>
    </div>
    <script>
      const userId = "{{ $authUser->id }}";
      const exerciseId = "{{ $exercise->id }}";
      const locale = "{{ LaravelLocalization::getCurrentLocale() }}";
      window.sicpEditorData = { userId, exerciseId, locale };
    </script>
@endsection
