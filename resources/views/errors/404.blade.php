@extends('layouts.app')
@section('content')
  <div class="container d-flex align-items-center justify-content-center">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1>{{ __('errors.404.title') }}</h1>
        <div class="mt-3">{{ __('errors.404.subtitle') }}</div>
        <div class="mt-3">
          <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
            {{ __('errors.404.button') }}
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
