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
              {{ BsForm::patch(route('settings.profile.update', [$user])) }}
              {{ BsForm::text('name', $user->name)->label(__('register.namePlaceholder')) }}
              {{ BsForm::text('github_name', $user->github_name)->label(__('account.github_name')) }}
              {{ BsForm::text('hexlet_nickname', $user->hexlet_nickname)->label(__('account.hexlet_nickname')) }}
              <div class="form-group mt-2">
                {{ BsForm::submit(__('layout.common.save'))->primary() }}
              </div>
              {{ BsForm::close() }}
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
