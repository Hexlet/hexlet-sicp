@extends('layouts.app')

@section('content')
<div class="d-flex flex-wrap justify-content-between mb-4">
    <div class="h3">{{ __('layout.nav.my_progress') }}</h3></div>
    <div class="h5">
        <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
    </div>
</div>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-chapters-tab" data-toggle="tab" href="#nav-chapters" role="tab" aria-controls="nav-home" aria-selected="true">{{ __('progresses.сhapters') }}</a>
    <a class="nav-item nav-link" id="nav-exercises-tab" data-toggle="tab" href="#nav-exercises" role="tab" aria-controls="nav-profile" aria-selected="false">{{ __('progresses.my_solutions') }}</a>
  </div>
</nav>
<div class="tab-content bg-white" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-chapters" role="tabpanel" aria-labelledby="nav-chapters-tab">@include('my.progresses._my_chapters')</div>
  <div class="tab-pane fade show" id="nav-exercises" role="tabpanel" aria-labelledby="nav-exercises-tab">@include('my.progresses._my_exercises')</div>
</div>
@endsection
