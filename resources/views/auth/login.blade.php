@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card">
        <h1 class="h4 text-center card-header p-3">
          {{ __('layout.login.form_header') }}
        </h1>
        <div class="card-body">
          {{ html()->form('POST', route('login'))->open() }}
          <div class="mb-3">
            {{ html()->label(__('layout.login.email'))->for('email')->class('form-label') }}
            {{ html()->email('email')->class(['form-control', 'is-invalid' => $errors->has('email')]) }}
            @error('email')
            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
            @enderror
          </div>
          <div class="mb-3">
            {{ html()->label(__('layout.login.password'))->for('password')->class('form-label') }}
            {{ html()->password('password')->class(['form-control', 'is-invalid' => $errors->has('password')]) }}
            @error('password')
            <span class="invalid-feedback">{{ $errors->first('password') }}</span>
            @enderror
          </div>
          <div class="mb-3 form-check">
            {{ html()->checkbox('remember')->class('form-check-input') }}
            {{ html()->label(__('layout.login.remember_me'))->for('remember')->class('form-label') }}
          </div>
          {{ html()->submit(__('layout.login.button'))->class('btn btn-primary btn-block') }}
          <a class="mt-2 d-block" href="{{ route('password.request') }}">{{ __('layout.login.reset_password') }}</a>
          {{ html()->form()->close() }}
        </div>
        <div class="card-footer p-4 text-center bg-transparent">
          @include('components.social_login')
        </div>
      </div>
    </div>
  </div>
@endsection
