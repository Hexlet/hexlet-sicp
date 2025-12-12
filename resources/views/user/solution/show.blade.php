@extends('layouts.app')

@section('meta-robots', 'nofollow, noindex')
@section('title')
  {{ getTitleContent(__('solution.solution_for_title', ['exercise' => $currentExercise->getFullTitle()])) }}
@endsection
@section('description'){{ $user->id }} - {{ __('solution.code_review') }} - {{ $user->name }} -
{{ __('solution.exercise') }} {{ $currentExercise->getFullTitle() }}@endsection

@section('content')

@auth
  <div class="d-flex flex-wrap justify-content-between mb-2 mb-lg-4">
    <div class="h5">
      <a href="{{ route('exercises.show', $currentExercise) }}">
      {{ __('solution.exercise') }} {{ $currentExercise->getFullTitle() }}
    </div>
    <div class="h5">
      <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
    </div>
  </div>

  <h2 class="text-center">{{ __('solution.code_review') }}</h2>
  <div class="text-center h5">{{ __('solution.sub_title') }}</div>
  <hr>

  <div class="row no-gutters mb-3">
    <div class="col-12 col-md-6 text-center">
      <h5>{{ __('solution.title_output_solution') }}</h5>
    </div>
    @if ($solutionsOfOtherUsers->isNotEmpty())
      <div class="col-12 col-md-6 text-center">
        <h5>{{ __('solution.solutions_of_others') }}</h5>
      </div>
    @endif
  </div>

  <div class="row no-gutters">
    <div class="col-12 col-md-6 p-2 p-lg-4">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        @foreach ($solutionsOfCurrentUser as $currentSolution)
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
        @foreach ($solutionsOfCurrentUser as $currentSolution)
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

    @if ($solutionsOfOtherUsers->isNotEmpty())
      <div class="col-12 col-md-6 p-2 p-lg-4">
        <div class="border-start d-none d-md-block"></div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          @foreach ($solutionsOfOtherUsers as $currentSolution)
            @if ($loop->first)
              <li class="nav-item" role="presentation">
                <a class="nav-link active" id="pills-{{ $currentSolution->id }}double-tab" data-bs-toggle="pill"
                   href="#pills-{{ $currentSolution->id }}double" role="tab"
                   aria-controls="pills-{{ $currentSolution->id }}double"
                   aria-selected="true">v.{{ $loop->iteration }}</a>
              </li>
            @else
              <li class="nav-item" role="presentation">
                <a class="nav-link" id="pills-{{ $currentSolution->id }}double-tab" data-bs-toggle="pill"
                   href="#pills-{{ $currentSolution->id }}double" role="tab"
                   aria-controls="pills-{{ $currentSolution->id }}double"
                   aria-selected="true">v.{{ $loop->iteration }}</a>
              </li>
            @endif
          @endforeach
        </ul>
        <div class="tab-content" id="pills-tabContent">
          @foreach ($solutionsOfOtherUsers as $currentSolution)
            @if ($loop->first)
              <div class="tab-pane fade show active" id="pills-{{ $currentSolution->id }}double" role="tabpanel"
                   aria-labelledby="pills-{{ $currentSolution->id }}double-tab">
                @solution(['solution' => $currentSolution])
              </div>
            @else
              <div class="tab-pane fade show" id="pills-{{ $currentSolution->id }}double" role="tabpanel"
                   aria-labelledby="pills-{{ $currentSolution->id }}double-tab">
                @solution(['solution' => $currentSolution])
              </div>
            @endif
          @endforeach
        </div>
      </div>
    @endif
  </div>
@else
  <div class="text-center py-5">
    <h3>{{ __('solution.login_to_view') }}</h3>
    <p class="text-muted">{{ __('solution.please_login_to_view_solution') }}</p>
    <a href="{{ route('login') }}" class="btn btn-primary mt-3">
      {{ __('login.submit') }}
    </a>
  </div>
@endauth
@endsection
