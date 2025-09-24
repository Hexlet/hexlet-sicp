@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card">
        <h1 class="h4 text-center card-header p-3">
          {{ __('register.title') }}
        </h1>
        <div class="card-body">
          {{ html()->form()->route('register')->open() }}
          <x-bs.form.text name="email" label="register.email" />
          <x-bs.form.text name="name" label="register.name" />
          <x-bs.form.password name="password" label="register.password" />
          <x-bs.form.password name="password_confirmation" label="register.password_confirmation" />

          <x-bs.form.submit label='register.submit' />

          <div class="mt-2">
            <a href="{{ route('login') }}">{{ __('register.login') }}</a>
            <a class="mt-2 d-block" href="{{ route('password.request') }}">{{ __('register.reset_password') }}</a>
            @if (app()->getLocale() == 'ru')
              <a href="{{ route('oauth.yandex') }}" class="mt-2 d-block"> {{ __('auth.with_yandex') }}</a>
            @else
              <a href="{{ route('oauth.github') }}" class="mt-2 d-block"> {{ __('auth.with_github') }}</a>
            @endif
          </div>
          {{ html()->form()->close() }}
        </div>
      </div>
    </div>
  </div>
@endsection
