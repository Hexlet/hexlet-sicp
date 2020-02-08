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
                    <p>{{ getExerciseDescription($exercise->path) }}</p>
                    @include(getExerciseListingViewFilepath($exercise->path))
                    @else
                        <p>{{ __('exercise.show.empty_description') }}</p>
                    @endif
                </div>
                <p>{{ __('exercise.show.nobody_completed') }}</p>
                @comments(['model' => $exercise])
            </div>
        </div>
    </div>
@endsection
