@extends('layouts.app')

@php
  $isSolutionsPage = request()->get('tab') === 'solutions';
@endphp

@section('description')
  {{ __('my.description') }}
@endsection
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
        <button
                class="nav-link {{ $isSolutionsPage ? '' : 'active' }}"
                id="nav-chapters-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-chapters"
                type="button"
                role="tab"
                aria-controls="nav-chapters"
                aria-selected="{{ $isSolutionsPage ? 'false' : 'true' }}"
        >
          {{ __('progresses.сhapters') }}
        </button>
        <button
                class="nav-link {{ $isSolutionsPage ? 'active' : '' }}"
                id="nav-solutions-tab"
                data-bs-toggle="tab"
                data-bs-target="#nav-solutions"
                type="button"
                role="tab"
                aria-controls="nav-solutions"
                aria-selected="{{ $isSolutionsPage ? 'true' : 'false' }}"
        >
          {{ __('progresses.my_solutions') }}
        </button>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div
              class="tab-pane fade show {{ $isSolutionsPage ? '' : 'active' }}"
              id="nav-chapters"
              role="tabpanel"
              aria-labelledby="nav-chapters-tab"
      >
        @include('my.progresses._my_chapters')
      </div>
      <div
              class="tab-pane fade show {{ $isSolutionsPage ? 'active' : '' }}"
              id="nav-solutions"
              role="tabpanel"
              aria-labelledby="nav-solutions-tab"
      >
        @include('my.progresses._my_solutions')
      </div>
    </div>
  </div>
@endsection
