@extends('layouts.app')
@php
/**
 * @var \App\Exercise $exercise
 * @var bool $userCompletedExercise
 * @var \App\User $authUser
 */
@endphp
@section('content')
    <div class="container">
        {{ Breadcrumbs::render('exercise', $exercise) }}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <small>
                    @if ($exercise->chapter)
                    <a href="{{ route('chapters.show', $exercise->chapter) }}">
                        {{ $exercise->chapter->path }}. {{ getChapterName($exercise->chapter->path) }}
                    </a>
                    @endif
                </small>
                <h1 class="h2">{{ __('exercise.exercise') }} {{ $exercise->path }}</h1>
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
                <div>
                @auth
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
                @endauth
                @if($exercise->users->isEmpty())
                <p>{{ __('exercise.show.nobody_completed') }}</p>
                @else
                <br/>
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
                                    @foreach ($chapter->users as $user)
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
                @comments(['model' => $exercise])
            </div>
        </div>
    </div>
@endsection
