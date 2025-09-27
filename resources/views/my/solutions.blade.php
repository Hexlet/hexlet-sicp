@extends('layouts.app')

@section('description')
    {{ __('my.description') }}
@endsection

@section('content')
    <div class="my-4">
        <div class="d-flex flex-wrap justify-content-between">
            <h3>{{ __('layout.nav.my_progress') }}</h3>
            <div class="h5 align-self-center">
                <a class="text-decoration-none" href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
            </div>
        </div>
        <h4><a href="{{ route('my.show') }}">{{ __('progresses.chapters') }}</a> / {{  __('progresses.my_solutions') }}</h4>

        <div class="table-responsive border border-top-0 p-2 p-lg-4">
            <table class="table">
                <thead>
                <tr>
                    <th class="border-top h5">{{ __('progresses.exercises') }}</th>
                    <th class="border-top h5">{{ __('progresses.solutions') }}</th>
                </tr>
                @foreach ($savedSolutionsExercises as $solution)
                    <tr>
                        <td>
                            {{ __('progresses.exercise') }} {{ $solution->exercise->getFullTitle() }} ({{ __('progresses.chapter') }}
                            {{ $solution->exercise->chapter->path }})
                        </td>
                        <td>
                            <a href="{{ route('users.solutions.show', [$user, $solution]) }}">
                            {{ __('progresses.see_details') }}
                        </td>
                    </tr>
                @endforeach
                </thead>
            </table>
        </div>
        {{ $savedSolutionsExercises->links() }}
    </div>
@endsection
