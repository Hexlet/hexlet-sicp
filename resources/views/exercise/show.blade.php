@extends('layouts.app')
@php
    /**
     * @var \App\Models\Exercise $exercise
     * @var \App\Models\Solution $userSolutions
     * @var bool $userCompletedExercise
     * @var \App\Models\User $authUser
     */
@endphp
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
        <div class="col-md-6">
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
                        @include(getExerciseListingViewFilepath($exercise->path))
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
                                            @include('exercise._modal.my_solutions', ['exercise' => $exercise, 'userSolutions' => $userSolutions])
                                            <button type="button"
                                                class="mr-1 btn btn-primary btn-light"
                                                data-toggle="modal"
                                                data-target="#showExercises">
                                            {{ __('solution.show_solution') }}
                                        </button>
                                    @endif

                                    {{ BsForm::open(route('users.exercises.store', [$authUser])) }}
                                    {{ Form::hidden('exercise_id', $exercise->id) }}
                                    {{ Form::button(($userCompletedExercise ? '<i class="fas fa-check"></i> ' : '')
                                        . __(sprintf('exercise.show.%s', $userCompletedExercise
                                        ? 'already_completed'
                                        : 'mark_complete')),
                                        ['type' =>'submit', 'class' => 'btn btn-success', 'disabled' => $userCompletedExercise]) }}

                                    @if ($userCompletedExercise)
                                        <a href="{{ route('users.exercises.destroy', [$authUser, $exercise]) }}"
                                           class="text-decoration-none"
                                           data-toggle="tooltip"
                                           data-placement="bottom"
                                           title="{{ __('exercise.remove_completed_exercise', ['exercise_path' => $exercise->path]) }}"
                                           data-confirm="{{ __('exercise.remove_completed_exercise', ['exercise_path' => $exercise->path]) }}?"
                                           data-method="delete">
                                            <span class="pl-2">{{ __('layout.common.cancel') }}</span>
                                        </a>
                                    @endif
                                    {{ BsForm::close() }}
                                </div>
                            @endauth
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
                    </div>
                    <div class="tab-pane fade" id="exercise-discussion" role="tabpanel" aria-labelledby="exercise-discussion-tab">
                        @comments(['model' => $exercise])
                    </div>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                @auth
                    <ul class="justify-content-center flex-shrink-0 nav nav-tabs" id="editor-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link rounded-0 active" id="editor-home-tab" data-toggle="tab" href="#editor" role="tab" aria-controls="editor" aria-selected="true">
                                {{ __('exercise.show.editor-tab') }}
                            </a>
                        </li>
                        @if(app()->environment('local'))
                            <li class="nav-item" role="presentation">
                                <a class="nav-link rounded-0" id="editor-tests-tab" data-toggle="tab" href="#editor-tests" role="tab" aria-controls="editor-tests" aria-selected="false">
                                    {{ __('exercise.show.tests-tab') }}
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link rounded-0" id="editor-contact-tab" data-toggle="tab" href="#editor-output" role="tab" aria-controls="editor-output" aria-selected="false">
                                    {{ __('exercise.show.output-tab') }}
                                </a>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content card-body" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="editor" role="tabpanel" aria-labelledby="editor">
                            {{ BsForm::open(route('users.solutions.store', [$authUser])) }}
                            {{ BsForm::textarea('content')->placeholder(__('solution.placeholder'))->required()->cols(200) }}
                            {{ Form::hidden('exercise_id', $exercise->id) }}
                            <div class="d-flex justify-content-end">
                                {{ BsForm::submit(__('solution.save'))->primary() }}
                            </div>
                            {{ BsForm::close() }}
                        </div>
                        @if(app()->environment('local'))
                            <div class="tab-pane fade" id="editor-tests" role="tabpanel" aria-labelledby="editor-tests">
                                Tests will coming soon...
                            </div>
                            <div class="tab-pane fade" id="editor-output" role="tabpanel" aria-labelledby="editor-output">
                                Output will coming soon...
                            </div>
                        @endif
                    </div>

                @else
                    <div class="card-body">
                        <h5 class="card-title">{{ __('exercise.show.editor.auth.required') }}</h5>
                        <p class="card-text">{{ __('exercise.show.editor.auth.must_log_in') }}</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">{{ __('layout.nav.login') }}</a>
                    </div>
                @endauth
            </div>
        </div>
@endsection
