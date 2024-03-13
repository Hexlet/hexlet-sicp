@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card">
        <h1 class="h4 text-center card-header p-3">
          {{ __('register.title') }}
        </h1>
        <div class="card-body">
          <div class="mb-3">
            {{ html()->form()->route('register')->open() }}
            {{ html()->label(__('register.email'))->for('email')->class('form-label') }}
            {{ html()->email('email')->class(['form-control', 'is-invalid' => $errors->has('email')]) }}
            @error('email')
            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
            @enderror
          </div>
          <div class="mb-3">
            {{ html()->label(__('register.name'))->for('email')->class('form-label') }}
            {{ html()->text('name')->class(['form-control', 'is-invalid' => $errors->has('name')]) }}
            @error('name')
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
            @enderror
          </div>
          <div class="mb-3">
            {{ html()->label(__('register.password'))->for('password')->class('form-label') }}
            {{ html()->password('password')->class(['form-control', 'is-invalid' => $errors->has('password')]) }}
            @error('password')
            <span class="invalid-feedback">{{ $errors->first('password') }}</span>
            @enderror
          </div>
          <div class="mb-3">
            {{ html()->label(__('register.password_confirmation'))->for('password')->class('form-label') }}
            {{ html()->password('password_confirmation')->class(['form-control', 'is-invalid' => $errors->has('password_confirmation')]) }}
            @error('password_confirmation')
            <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
            @enderror
          </div>
          <div class="mb-3">
            {{ html()->submit(__('register.submit'))->class('btn btn-primary btn-block') }}
          </div>
          <div class="mt-2">
            <a href="{{ route('login') }}">{{ __('register.login') }}</a>
            <a class="mt-2 d-block" href="{{ route('password.request') }}">{{ __('register.reset_password') }}</a>
            <a href="{{ route('oauth.github') }}" class="mt-2 d-block"> {{ __('auth.with_github') }}</a>
          </div>
          {{ html()->form()->close() }}
        </div>
      </div>
    </div>
  </div>
@endsection
