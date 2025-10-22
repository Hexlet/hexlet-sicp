@extends('layouts.app')
@php
  /** @var \Illuminate\Support\Collection $rating */
@endphp
@section('description')
  {{ __('rating.index.description') }}
@endsection
@section('content')
  <div class="my-4">
    @include('rating._menu')

    <section>
      <h1 class="h3">{{ __('rating.index.title') }}</h1>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>{{ __('rating.positions') }}</th>
              <th>{{ __('rating.user') }}</th>
              <th>{{ __('rating.number_of_points') }}</th>
              @auth
                @if(auth()->user()->is_admin)
                  <th>Действия</th>
                @endif
              @endauth
            </tr>
          </thead>
          <tbody>
            @foreach ($rating as $user)
              <tr>
                <td>{{ $user->position }}</td>
                <td>
                  <a class="text-decoration-none" href="{{ route('users.show', $user) }}">
                    <img class="rounded-circle mr-1" width="30" height="30"
                      src="{{ $user->present()->getProfileImageLink() }}" alt="Profile image">
                    {{ $user->name }}
                  </a>
                </td>
                <td>{{ $user->points }}</td>
                @auth
                  @if(auth()->user()->is_admin)
                    <td>
                      <a href="{{ route('settings.profile.index', ['user_id' => $user->id]) }}" class="btn btn-sm btn-primary">
                        {{ __('rating.edit_profile') }}
                      </a>
                    </td>
                  @endif
                @endauth
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
  </div>
@endsection
