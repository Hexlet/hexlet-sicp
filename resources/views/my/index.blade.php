@extends('layouts.bootstrap5.app')
@section('description'){{ __('my.description') }}@endsection
@section('content')
<div class="my-4">
    <div class="d-flex flex-wrap justify-content-between">
        <h1 class="h3">{{ __('layout.nav.my_progress') }}</h1>
        <div class="h5 align-self-center">
            <a class="text-decoration-none" href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
        </div>
    </div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-chapters-tab" data-bs-toggle="tab" data-bs-target="#nav-chapters" type="button" role="tab" aria-controls="nav-chapters" aria-selected="true">{{ __('progresses.сhapters') }}</button>
            <button class="nav-link" id="nav-solutions-tab" data-bs-toggle="tab" data-bs-target="#nav-solutions" type="button" role="tab" aria-controls="nav-solutions" aria-selected="false">{{ __('progresses.my_solutions') }}</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-chapters" role="tabpanel" aria-labelledby="nav-chapters-tab">
            @include('my.progresses._my_chapters')
        </div>
        <div class="tab-pane fade show" id="nav-solutions" role="tabpanel" aria-labelledby="nav-solutions-tab">
            @include('my.progresses._my_solutions')
        </div>
    </div>
</div>
@endsection
