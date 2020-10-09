@extends('layouts.app')
@php
/**
 * @var \App\Exercise $exercise
 * @var \App\Solution $solutions
 * @var bool $userCompletedExercise
 * @var \App\User $authUser
 */
@endphp
@section('description'){{ __('exercise.exercise') }} {{ $exercise->path }} {{ getExerciseTitle($exercise) }} {{ __('exercise.show.description') }}@endsection
@section('content')
    {{ Breadcrumbs::render('exercise', $exercise) }}
    <div class="row justify-content-center">
        <div class="sticky-top col-md-12 d-flex justify-content-between">
            @if($previousExercise->exists)
            <a class="mr-auto text-decoration-none" href="{{ route('exercises.show', $previousExercise) }}">
                <svg class="bi bi-arrow-left" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.854 4.646a.5.5 0 0 1 0 .708L3.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                    <path fill-rule="evenodd" d="M2.5 8a.5.5 0 0 1 .5-.5h10.5a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
                @lang('exercise.show.previous')
            </a>
            @endif
            @if($nextExercise->exists)
            <a class="ml-auto text-decoration-none" href="{{ route('exercises.show', $nextExercise) }}">
                @lang('exercise.show.next')
                <svg class="bi bi-arrow-right" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z"/>
                </svg>
            </a>
            @endif
        </div>
        <div class="col-md-8">
            <small>
                @if ($exercise->chapter)
                <a href="{{ route('chapters.show', $exercise->chapter) }}">
                    {{ $exercise->chapter->path }}. {{ getChapterName($exercise->chapter->path) }}
                </a>
                @endif
            </small>

            <div class="h4 mt-2">
                {{ __('exercise.exercise') }} {{ $exercise->path }}
                <small>
                    <a class="text-muted"
                        target="_blank"
                        href="{{ getExerciseOriginLink($exercise) }}"
                        data-toggle="tooltip"
                        data-placement="right"
                        title="{{ __('layout.common.origin') }}">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                </small>
            </div>
            <h1 class="mb-2">{{ getExerciseTitle($exercise) }}</h1>
            <div>
                @if(view()->exists(getExerciseListingViewFilepath($exercise->path)))
                @include(getExerciseListingViewFilepath($exercise->path))
                @else
                <p>{{ __('exercise.show.empty_description') }}</p>
                <p>
                    <i class="fas fa-github-alt"></i>
                    <a href="https://github.com/Hexlet/hexlet-sicp/issues/122">
                        {{ __('exercise.show.help_us') }}
                    </a>
                </p>
                @endif
            </div>
            <hr>
            <div>
            @auth
            <div class="d-flex mb-4">
                <button type="button" class="mr-1 btn btn-primary" data-toggle="modal" data-target="#interExercise">{{ __('solution.add_solution') }}</button>
                @if(!$solutions->isEmpty())
                <button type="button" class="mr-1 btn btn-primary" data-toggle="modal" data-target="#showExercises">{{ __('solution.show_solution') }}</button>
                @endif

                @solutions(['exercise' => $exercise, 'solutions' => $solutions])

                {!! Form::open()->route('users.exercises.store', [$authUser])->post() !!}
                {!! Form::hidden('exercise_id', $exercise->id) !!}
                {!! Form::submit(($userCompletedExercise ? '<i class="fas fa-check"></i> ' : '')
                    . __(sprintf('exercise.show.%s', $userCompletedExercise
                        ? 'already_completed'
                        : 'mark_complete')))
                            ->success()
                            ->disabled($userCompletedExercise) !!}
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
                {!! Form::close() !!}
            </div>
            @endauth
            @if($exercise->users->isEmpty())
            <p>{{ __('exercise.show.nobody_completed') }}</p>
            @else
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCart">{{ __('exercise.show.who_completed') }}</button>
            <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">{{ __('exercise.show.completed_by') }}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                @foreach ($exercise->users as $user)
                                <li><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">{{ __('layout.common.close') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <hr>
            @comments(['model' => $exercise])
        </div>
    </div>
@endsection
