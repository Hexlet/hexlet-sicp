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

              @if(auth()->user()->is_admin && auth()->id() !== $user->id)
                <input type="hidden" name="user_id" value="{{ $user->id }}">
              @endif

              <x-bs.form.text name="name" label="settings.profile.name" />
              <x-bs.form.text name="github_name" label="settings.profile.github_name" />
              <x-bs.form.text name="hexlet_nickname" label="settings.profile.hexlet_nickname" />

              @if(auth()->check() && auth()->user()->is_admin)
                <div class="form-group mb-4">
                  <input type="hidden" name="is_admin" value="0">
                  <div class="form-check">
                    <input type="checkbox"
                           class="form-check-input"
                           id="is_admin"
                           name="is_admin"
                           value="1"
                      {{ $user->is_admin ? 'checked' : '' }}>
                    <label class="form-check-label fw-bold" for="is_admin">
                      Администратор
                    </label>
                  </div>
                </div>
              @endif

              <x-bs.form.submit />
              {{ html()->closeModelForm() }}
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
