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

<h1 class="text-center">{{ __('solution.code_review') }}</h1>
<div class="d-flex flex-wrap">
    <div class="card flex-grow-1">
        <div class="card-header">
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
        </div>
        <div class="tab-content card-body" id="pills-tabContent">
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
    <div class="card flex-grow-1 flex-lg-grow-0 w-50">
        <div class="card-header">
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
        </div>
        <div class="tab-content card-body" id="pills-tabContent">
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
