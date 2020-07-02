@extends('layouts.app')

@section('content')

<div class="d-flex flex-wrap justify-content-between mb-4">
    <div class="h5">
        <a href="{{ route('exercises.show', $currentExercise) }}">
        {{ __('solution.exercise') }} {{ $currentExercise->path }}: {{ getExerciseTitle($currentExercise) }}
    </div>
    <div class="h5">
        <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
    </div>
</div>

<div class="h1 text-center mb-4">{{ __('solution.code_review') }}</div>

<div class="d-flex flex-wrap">
    <div class="flex-grow-1 flex-shrink-1 p-4">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach ($solutionsListForCurrentExercise as $currentSolution)
                @if ($loop->first)
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-{{ $currentSolution->id }}-tab" data-toggle="pill" href="#pills-{{ $currentSolution->id }}" role="tab" aria-controls="pills-{{ $currentSolution->id }}" aria-selected="true">v.{{ $loop->iteration }}</a>
                </li>
                @else
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-{{ $currentSolution->id }}-tab" data-toggle="pill" href="#pills-{{ $currentSolution->id }}" role="tab" aria-controls="pills-{{ $currentSolution->id }}" aria-selected="true">v.{{ $loop->iteration }}</a>
                </li>
                @endif
            @endforeach
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @foreach ($solutionsListForCurrentExercise as $currentSolution)
                @if ($loop->first)
                <div class="tab-pane fade show active" id="pills-{{ $currentSolution->id }}" role="tabpanel" aria-labelledby="pills-{{ $currentSolution->id }}-tab">
                    <pre><code>{{ $currentSolution->content }}</code></pre>
                </div>
                @else
                <div class="tab-pane fade show" id="pills-{{ $currentSolution->id }}" role="tabpanel" aria-labelledby="pills-{{ $currentSolution->id }}-tab">
                    <pre><code>{{ $currentSolution->content }}</code></pre>
                </div>
                @endif
            @endforeach
        </div>
    </div>

    @if (count($solutionsListForCurrentExercise) > 1)
    <div class="flex-grow-1 flex-shrink-1 p-4 border-left">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @foreach ($solutionsListForCurrentExercise as $currentSolution)
                @if ($loop->first)
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-{{ $currentSolution->id }}double-tab" data-toggle="pill" href="#pills-{{ $currentSolution->id }}double" role="tab" aria-controls="pills-{{ $currentSolution->id }}double" aria-selected="true">v.{{ $loop->iteration }}</a>
                </li>
                @else
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-{{ $currentSolution->id }}double-tab" data-toggle="pill" href="#pills-{{ $currentSolution->id }}double" role="tab" aria-controls="pills-{{ $currentSolution->id }}double" aria-selected="true">v.{{ $loop->iteration }}</a>
                </li>
                @endif
            @endforeach
        </ul>
        <div class="tab-content" id="pills-tabContent">
            @foreach ($solutionsListForCurrentExercise as $currentSolution)
                @if ($loop->first)
                <div class="tab-pane fade show active" id="pills-{{ $currentSolution->id }}double" role="tabpanel" aria-labelledby="pills-{{ $currentSolution->id }}double-tab">
                    <pre><code>{{ $currentSolution->content }}</code></pre>
                </div>
                @else
                <div class="tab-pane fade show" id="pills-{{ $currentSolution->id }}double" role="tabpanel" aria-labelledby="pills-{{ $currentSolution->id }}double-tab">
                    <pre><code>{{ $currentSolution->content }}</code></pre>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    @endif
</div>




@endsection
