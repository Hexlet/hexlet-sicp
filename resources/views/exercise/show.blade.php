@php
    /** @var \App\Exercise $exercise */
@endphp

@extends('layouts.app')

@section('content')
    <div class="container">
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
                        <p>{{ __('exercise.show.empty_description') }}
                        </p>
                        <p>
                            <i class="fas fa-github-alt"></i><a href="https://github.com/Hexlet/hexlet-sicp/issues/122">{{ __('exercise.show.help_us') }}</a>
                        </p>
                    @endif
                </div>
                <p>{{ __('exercise.show.nobody_completed') }}</p>
                @auth
                    {!! Form::open()->route('users.exercises.store', [auth()->user()])->post() !!}
                    {!! Form::hidden('exercise_id', $exercise->id) !!}
                    {!! Form::submit(__(sprintf('exercise.show.%s', $userCompletedExercise ? 'already_completed' : 'mark_complete')))
                                ->success()
                                ->disabled($userCompletedExercise) !!}
                    {!! Form::close() !!}
                @endauth
                @comments(['model' => $exercise])
            </div>
        </div>
    </div>
@endsection
