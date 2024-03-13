@extends('layouts.app')
@php
  /**
   * @var \App\Models\User $user
   */
@endphp
@section('content')
  <div class="row my-4">
    @include('settings._menu')
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-8">
          <div class="card mb-2">
            <div class="card-body">
              <h1 class="card-title h3">{{ __('account.profile') }} {{ $user->email }}</h1>
              {{ html()->modelForm($user, 'PATCH', route('settings.profile.update', [$user]))->open() }}
              <x-bs.form.text name="name" label="settings.profile.name" />
              <x-bs.form.text name="github_name" label="settings.profile.github_name" />
              <x-bs.form.text name="hexlet_nickname" label="settings.profile.hexlet_nickname" />
              <x-bs.form.submit />
              {{ html()->form()->close() }}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="{{ $user->present()->getProfileImageLink() }}" alt="Card image cap">
            <div class="card-body">
              <p class="card-text">
                <a href="https://gravatar.com" target="_blank">Go to Gravatar.com</a>
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
@endsection
