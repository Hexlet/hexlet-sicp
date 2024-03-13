@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card">
        <h1 class="h4 text-center card-header p-3">
          {{ __('passwords.reset_password.form_header') }}
        </h1>
        <div class="card-body">

          {{ html()->form()->action(route('password.update'))->open() }}
          {{ html()->hidden('token')->value($token )}}
          <div class="mb-3">
            {{ html()->label(__(__('passwords.reset_password.email')))->for('email')->class('form-label') }}
            {{ html()->email('email')->class(['form-control', 'is-invalid' => $errors->has('email')]) }}
            @error('email')
            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
            @enderror
          </div>
          <div class="mb-3">
            {{ html()->label(__('passwords.reset_password.password'))->for('password')->class('form-label') }}
            {{ html()->password('password')->class(['form-control', 'is-invalid' => $errors->has('password')]) }} @error('password')
            <span class="invalid-feedback">{{ $errors->first('password') }}</span>
            @enderror
          </div>
          <div class="mb-3">
            {{ html()->label(__('passwords.reset_password.confirm_password'))->for('password')->class('form-label') }}
            {{ html()->password('password_confirmation')->class(['form-control', 'is-invalid' => $errors->has('password_confirmation')]) }}
            @error('password_confirmation')
            <span class="invalid-feedback">{{ $errors->first('password_confirmation') }}</span>
            @enderror
          </div>
          <div class="mb-3">
            {{ html()->submit(__('passwords.reset_password.button'))->class('btn btn-primary btn-block') }}
          </div>
          {{ html()->form()->close() }}
        </div>
      </div>
    </div>
  </div>
@endsection
