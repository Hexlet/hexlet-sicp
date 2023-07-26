@extends('layouts.app')
@php
  /** @var \Illuminate\Support\Collection $rating */
@endphp
@section('description')
  {{ __('rating.index.description') }}
@endsection
@section('content')
  <div class="my-4">
    @include('rating.menu')

    <section>
      <h1 class="h3">{{ __('rating.index.title') }}</h1>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>{{ __('rating.positions') }}</th>
              <th>{{ __('rating.user') }}</th>
              <th>{{ __('rating.number_of_points') }}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rating as $position => ['user' => $user, 'points' => $points])
              <tr>
                <td>{{ $position }}</td>
                <td>
                  <a class="text-decoration-none" href="{{ route('users.show', $user) }}">
                    <img class="rounded-circle mr-1" width="30" height="30"
                      src="{{ $user->present()->getProfileImageLink() }}" alt="Profile image">
                    {{ $user->name }}
                  </a>
                </td>
                <td>{{ $points }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
  </div>
@endsection
