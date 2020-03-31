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
                            @lang('exercise.show.help_us')
                        </a>
                    </p>
                    @endif
                </div>
                @if($exercise->users->isEmpty())
                <p>{{ __('exercise.show.nobody_completed') }}</p>
                @else
                <p>@lang('exercise.show.who_completed')</p>
                <ul>
                    @foreach($exercise->users as $user)
                    <li>{{ $user->name }}</li>
                    @endforeach
                </ul>
                @endif
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
                   title="@lang('exercise.my_page.remove_completed_exercise', ['exercise_path' => $exercise->path])"
                   data-confirm="{{ __('account.are_you_sure') }}"
                   data-method="delete">
                    <span class="pl-2">@lang('layout.common.cancel')</span>
                </a>
                @endif
                {!! Form::close() !!}
                @endauth
                @comments(['model' => $exercise])
            </div>
        </div>
    </div>
@endsection
