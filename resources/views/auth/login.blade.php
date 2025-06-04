@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card">
        <h1 class="h4 text-center card-header p-3">
          {{ __('login.title') }}
        </h1>
        <div class="card-body">
          {{ html()->form()->route('login')->open() }}

          <x-bs.form.text name="email" label="login.email" />
          <x-bs.form.password name="password" label="login.password" />
          <x-bs.form.checkbox name="remember" label="login.remember_me" />

          <x-bs.form.submit label='login.submit' />

          <a class="mt-2 d-block" href="{{ route('register') }}">{{ __('login.register') }}</a>
          <a class="mt-2 d-block" href="{{ route('password.request') }}">{{ __('login.reset_password') }}</a>
          @if (app()->getLocale() !== 'ru')
            <a href="{{ route('oauth.github') }}" class="mt-2 d-block"> {{ __('auth.with_github') }}</a>
          @endif

          {{ html()->form()->close() }}
        </div>
      </div>
    </div>
  </div>
@endsection
