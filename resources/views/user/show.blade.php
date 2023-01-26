@extends('layouts.app')

@php
/**
 * @var \App\Models\Chapter $chapter
 * @var string $userRatingPosition
 * @var int $points
 * @var \App\Models\User $user
 */
@endphp
@section('description', $user->name)
@push('styles')
<link href="{{ mix('css/_activity_chart.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="row my-4">
        <div class="col-12 col-md-3">
            <div class="sticky-top pt-4 mb-2 x-z-index-0">
                <img class="w-100 img-fluid" src="{{ $user->present()->getProfileImageLink() }}" alt="User avatar">
                <h1 class="h4 text-break my-2">{{ $user->name }}</h1>
                <div class="h5">
                    <span class="bi bi-trophy-fill"></span>
                    <span>{{ $userRatingPosition }}</span>
                    <a class="h6" href="{{ route('top.index') }}">
                        {{ __('user.show.statistics.rating') }}
                    </a>
                </div>
                <div class="h5">
                    <span class="bi bi-award"></span>
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
                <div class="mt-3">
                    @if ($user->github_name)
                    <span>
                        <a class="x-link-without-decoration mr-3 mb-2 text-dark" target="_blank" rel="noopener noreferrer" href="https://github.com/{{ $user->github_name }}">
                            <i class="bi bi-github icon-2x"></i>
                        </a>
                    </span>
                    @endif
                    @if($user->hexlet_nickname)
                    <span>
                        <a class="x-link-without-decoration mr-2 text-dark" target="_blank" rel="noopener noreferrer" href="https://ru.hexlet.io/u/{{ $user->hexlet_nickname }}">
                            <img class="mb-3" src={{ mix('img/hexlet_logo.png') }} width="20" height="30" alt="Hexlet logo"  >
                        </a>
                    </span>
                    @endif
                </div>
                @can('update', $user)
                <div class="small mt-4">
                    <a class="text-muted" href="{{ route('settings.profile.index') }}">
                        {{ __('user.show.statistics.edit_profile') }}
                    </a>
                </div>
                @endcan
            </div>
        </div>
        <div class="col-12 col-md-9 my-4">
            <div class="shadow rounded p-3 mb-5">
                <div class="h2 text-center text-secondary mb-2">
                    {{ __('user.show.statistics.statistics') }}
                </div>
                <div class="row no-gutters my-2">
                    <div class="col-4 col-md text-center my-2">
                        <div class="h2 text-info">
                            {{ $user->readChapters->count() }}
                        </div>
                        <div class="text-secondary">
                            {{ trans_choice('user.show.statistics.read_chapters', $user->readChapters->count()) }}
                        </div>
                    </div>
                    <div class="col-4 col-md text-center my-2">
                        <div class="h2 text-info">
                            {{ $user->exerciseMembers()->finished()->count() }}
                        </div>
                        <div class="text-secondary">
                            {{ trans_choice('user.show.statistics.exercise_members', $user->exerciseMembers->count()) }}
                        </div>
                    </div>
                    <div class="col-4 col-md text-center my-2">
                        <a class="text-decoration-none" href="{{ route('users.comments.index', [$user]) }}">
                            <div class="h2 text-info">
                                {{ $user->comments->count() }}
                            </div>
                            <div class="text-secondary">
                                    {{ trans_choice('user.show.statistics.comments', $user->comments->count()) }}
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    @include('components.activity_chart')
                </div>
            </div>
        </div>
    </div>
@endsection
