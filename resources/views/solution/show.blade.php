@extends('layouts.bootstrap5.app')

@section('title'){{ __('solution.exercise') }} {{ getTitleContent(getFullExerciseTitle($currentExercise)) }}@endsection
@section('description'){{ $user->id }} - {{ __('solution.code_review') }} - {{ $user->name }} - {{ __('solution.exercise') }} {{ getFullExerciseTitle($currentExercise) }}@endsection

@section('content')

<div class="d-flex flex-wrap justify-content-between mb-2 mb-lg-4">
    <div class="h5">
        <a href="{{ route('exercises.show', $currentExercise) }}">
        {{ __('solution.exercise') }} {{ getFullExerciseTitle($currentExercise) }}
    </div>
    <div class="h5">
        <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
    </div>
</div>

<h2 class="text-center">{{ __('solution.code_review') }}</h2>
<div class="text-center h5">{{ __('solution.sub_title') }}</div>
<hr>
<div class="row no-gutters">
    <div class="col-12 col-md p-2 p-lg-4">
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
                    @solution(['solution' => $currentSolution])
                </div>
                @else
                <div class="tab-pane fade show" id="pills-{{ $currentSolution->id }}" role="tabpanel" aria-labelledby="pills-{{ $currentSolution->id }}-tab">
                    @solution(['solution' => $currentSolution])
                </div>
                @endif
            @endforeach
        </div>
    </div>

    @if (count($solutionsListForCurrentExercise) > 1)
    <div class="d-none d-md-block border-left"></div>
    <div class="col p-2 p-lg-4">
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
                    @solution(['solution' => $currentSolution])
                </div>
                @else
                <div class="tab-pane fade show" id="pills-{{ $currentSolution->id }}double" role="tabpanel" aria-labelledby="pills-{{ $currentSolution->id }}double-tab">
                    @solution(['solution' => $currentSolution])
                </div>
                @endif
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
