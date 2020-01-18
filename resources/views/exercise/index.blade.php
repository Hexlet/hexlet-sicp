@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="h2">{{ __('sicp.title') }}</h1>
            <h2 class="h5 text-muted mb-4">by {{ __('sicp.authors') }}</h2>
            @foreach($exercisesGroups as $rootChapterPath => $exercises)
            <h3>Chapter {{ $rootChapterPath }}</h3>
            <p>
                @foreach($exercises as $exercise)
                <a title="{{ __('exercise.exercise') }} {{ $exercise->path }}"
                   href="{{ route('exercises.show', $exercise) }}">
                {{ $exercise->path }}
                    <br>
                </a>
                @endforeach
            </p>
            @endforeach
        </div>
    </div>
</div>
@endsection
