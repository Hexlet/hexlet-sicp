@extends('layouts.app')
@section('description'){{ __('rating.comments.description') }}@endsection
@section('content')
    <div class="my-4">
        @include('rating.menu')

        <h1 class="h3">{{ __('rating.comments.title') }}</h1>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('rating.positions') }}</th>
                        <th>{{ __('rating.user') }}</th>
                        <th>{{ __('rating.number_of_comments') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($commentsRating as $position => ['user' => $user, 'commentsCount' => $commentsCount])
                        <tr>
                            <td>{{ $position }}</td>
                            <td>
                                <a class="text-decoration-none" href="{{ route('users.show', $user) }}">
                                    <img class="rounded-circle me-1" width="30" height="30" src="{{ getProfileImageLink($user) }}" alt="Profile image">
                                    {{ $user->name }}
                                </a>
                            </td>
                            <td>{{ $commentsCount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
