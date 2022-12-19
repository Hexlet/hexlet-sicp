@extends('layouts.app')
@section('description'){{ __('rating.progress.description') }}@endsection
@section('content')
    <div class="my-4">
        @include('rating.menu')
        <h1 class="h3">{{ __('rating.progress.title') }}</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('rating.positions') }}</th>
                        <th>{{ __('rating.user') }}</th>
                        <th>
                            @include('components.sorting_widget',[
                                'sortParams' => $sortParams,
                                'nameParams' => 'read_chapters_count',
                                'name' => __('rating.read_chapters_from', ['count' => App\Models\Chapter::MARKABLE_COUNT]),
                                'route' => route('progress_top.index', $nextChaptersParameterFromSort),
                            ])
                        <th>
                            @include('components.sorting_widget',[
                               'sortParams' => $sortParams,
                               'nameParams' => 'completed_exercises_count',
                               'name' => __('rating.completed_exercises_from', ['count' => $exercisesCount]),
                               'route' => route('progress_top.index', $nextExercisesParameterFromSort),
                           ])
                        </th>
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
