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
                    {{ getExerciseDescription($exercise->path) ?: __('exercise.show.empty_description') }}
                </div>
                <p>{{ __('exercise.show.nobody_completed') }}</p>
            </div>
        </div>
    </div>
@endsection
