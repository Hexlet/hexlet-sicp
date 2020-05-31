@extends('layouts.app')
@section('content')
    <div class="my-4">
        @include('rating.menu')

        <h3>{{ __('rating.progress') }}</h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('rating.positions') }}</th>
                        <th>{{ __('rating.user') }}</th>
                        <th>{{ __('rating.read_chapters_from') }} {{ $chapters->count() }}</th>
                        <th>{{ __('rating.completed_exercises_from') }} {{ $exercises->count() }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rating as $position => [
                        'user' => $user,
                        ])
                        <tr>
                            <td>{{ $position }}</td>
                            <td>
                                <a class="text-decoration-none" href="{{ route('users.show', $user) }}">
                                    <img class="rounded-circle mr-1" width="30" height="30" src="{{ getProfileImageLink($user) }}" alt="Profile image">
                                    {{ $user->name }}
                                </a>
                            </td>
                            <td>{{ $user->read_chapters_count }}</td>
                            <td>{{ $user->completed_exercises_count }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
