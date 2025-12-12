@extends('layouts.app')

@section('meta-robots', 'nofollow, noindex')
@section('title')
  {{ getTitleContent(__('solution.solution_for_title', ['exercise' => $currentExercise->getFullTitle()])) }}
@endsection
@section('description'){{ $user->id }} - {{ __('solution.code_review') }} - {{ $user->name }} -
{{ __('solution.exercise') }} {{ $currentExercise->getFullTitle() }}@endsection

@section('content')

  <div class="d-flex flex-wrap justify-content-between mb-2 mb-lg-4">
    <div class="h5">
      <a href="{{ route('exercises.show', $currentExercise) }}">
      {{ __('solution.exercise') }} {{ $currentExercise->getFullTitle() }}
    </div>
    <div class="h5">
      <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
    </div>
  </div>

  <h2 class="text-center">{{ __('solution.title_add_solution') }}</h2>
  <hr>
  <div class="row no-gutters">
    <div class="col-12 col-md p-2 p-lg-4">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        @foreach ($solutionsListForCurrentExercise as $currentSolution)
          @if ($loop->first)
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-{{ $currentSolution->id }}-tab" data-bs-toggle="pill"
                 href="#pills-{{ $currentSolution->id }}" role="tab" aria-controls="pills-{{ $currentSolution->id }}"
                 aria-selected="true">v.{{ $loop->iteration }}</a>
            </li>
          @else
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-{{ $currentSolution->id }}-tab" data-bs-toggle="pill"
                 href="#pills-{{ $currentSolution->id }}" role="tab" aria-controls="pills-{{ $currentSolution->id }}"
                 aria-selected="true">v.{{ $loop->iteration }}</a>
            </li>
          @endif
        @endforeach
      </ul>
      <div class="tab-content" id="pills-tabContent">
        @foreach ($solutionsListForCurrentExercise as $currentSolution)
          @if ($loop->first)
            <div class="tab-pane fade show active" id="pills-{{ $currentSolution->id }}" role="tabpanel"
                 aria-labelledby="pills-{{ $currentSolution->id }}-tab">
              @solution(['solution' => $currentSolution])
            </div>
          @else
            <div class="tab-pane fade show" id="pills-{{ $currentSolution->id }}" role="tabpanel"
                 aria-labelledby="pills-{{ $currentSolution->id }}-tab">
              @solution(['solution' => $currentSolution])
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
@endsection
