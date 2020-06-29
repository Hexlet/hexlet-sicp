@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <div class="h3">{{ __('layout.nav.my_progress') }}</h3></div>
    <div class="h5">
        <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
    </div>
</div>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-chapters-tab" data-toggle="tab" href="#nav-chapters" role="tab" aria-controls="nav-home" aria-selected="true">Chapters</a>
    <a class="nav-item nav-link" id="nav-exercises-tab" data-toggle="tab" href="#nav-exercises" role="tab" aria-controls="nav-profile" aria-selected="false">Exercises</a>
  </div>
</nav>
<div class="tab-content bg-white" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-chapters" role="tabpanel">@include('my.progresses._my_chapters')</div>
  <div class="tab-pane fade" id="nav-exercises" role="tabpanel">@include('my.progresses._my_exercises')</div>
</div>
@endsection
