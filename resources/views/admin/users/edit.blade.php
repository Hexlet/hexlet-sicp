@extends('layouts.app')

@section('title', __('admin.users.edit_user'))

@section('content')
  <div class="row my-4">
    @include('settings._menu')
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-8">
          <div class="card mb-2">
            <div class="card-body">
              <h1 class="card-title h3">{{ __('account.profile') }} {{ $user->email }}</h1>
              {{ html()->modelForm($user, 'PUT', route('admin.users.update', [$user]))->open() }}
              <x-bs.form.text name="name" label="settings.profile.name" />
              <x-bs.form.text name="github_name" label="settings.profile.github_name" />

              <div class="mb-3">
                <div class="form-check">
                  {{ html()->checkbox('is_admin')
                      ->class('form-check-input')
                      ->value(1)
                      ->checked($user->is_admin) }}
                  {{ html()->label(__('account.is_admin'), 'is_admin')
                      ->class('form-check-label') }}
                </div>
              </div>

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
