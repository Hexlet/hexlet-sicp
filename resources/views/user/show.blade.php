@extends('layouts.app')

@php
/**
 * @var \App\Chapter $chapter
 * @var string $userRatingPosition
 * @var int $points
 * @var \App\User $user
 */
@endphp
@section('description', $user->name)
@section('content')
    <div class="row my-4">
        <div class="col-12 col-md-3">
            <div class="sticky-top pt-4 mb-2 x-z-index-0">
                <img class="w-100 img-fluid" src="{{ getProfileImageLink($user) }}" alt="Card image cap">
                <h1 class="h3 text-break my-2">{{ $user->name }}</h1>
                <div class="h4">
                    <span class="fas fa-trophy"></span>
                    <span>{{ $userRatingPosition }}</span>
                    <a class="h6" href="{{ route('top.index') }}">
                        {{ __('user.show.statistics.rating') }}
                    </a>
                </div>
                <div class="h4">
                    <span class="fas fa-award mx-1"></span>
                    <span>{{ $points }}</span>
                    <span class="h6 text-secondary"> {{ trans_choice('user.show.statistics.points', $points) }}</span>
                </div>
                <div class="text-secondary">
                    {{ __('user.show.statistics.created_at') }}
                    @if (App::isLocale('ru'))
                    {{ $user->created_at->isoFormat('DD MMMM YYYY') }}
                    @else
                    {{ $user->created_at->isoFormat('MMMM Do YYYY') }}
                    @endif
                </div>
                @if ($user->github_name)
                <div class="mt-3">
                    <a class="x-link-without-decoration mr-2 mb-2 text-dark" target="_blank" rel="noopener noreferrer" href="https://github.com/{{ $user->github_name }}">
                        <i class="fab fa-github fa-2x"></i>
                    </a>
                </div>
                @endif
                @if ($user->hexlet_nickname)
                    <a class="x-link-without-decoration mr-2 mb-2 text-dark" target="_blank" rel="noopener noreferrer" href="https://ru.hexlet.io/u/{{ $user->hexlet_nickname }}">
                        Hexlet
                    </a>
                @endif
                @auth
                    @if (Auth::user()->id === $user->id)
                        <div class="small mt-4">
                            <a class="text-muted" href="{{ route('settings.profile.index') }}">
                                {{ __('user.show.statistics.edit_profile') }}
                            </a>
                        </div>
                    @endif
                @endauth
            </div>
        </div>
        <div class="col-12 col-md-9 my-4">
            <div class="shadow p-3 mb-5 bg-white rounded">
                <div class="h2 text-center text-secondary mb-2">{{ __('user.show.statistics.statistics') }}</div>
                <div class="row no-gutters my-2">
                    <div class="col-12 col-md text-center my-2">
                        <div class="h2 text-info">
                            {{ $user->readChapters->count() }}
                        </div>
                        <div class="text-secondary">
                            {{ trans_choice('user.show.statistics.read_chapters', $user->readChapters->count()) }}
                        </div>
                    </div>
                    <div class="col-12 col-md text-center my-2">
                        <div class="h2 text-info">
                            {{ $user->completedExercises->count() }}
                        </div>
                        <div class="text-secondary">
                            {{ trans_choice('user.show.statistics.completed_exercises', $user->completedExercises->count()) }}
                        </div>
                    </div>
                    <div class="col-12 col-md text-center my-2">
                        <div class="h2 text-info">
                            {{ $user->comments->count() }}
                        </div>
                        <div class="text-secondary">
                            {{ trans_choice('user.show.statistics.comments', $user->comments->count()) }}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('components.activity_chart')
                </div>
            </div>
        </div>

    </div>
@endsection
