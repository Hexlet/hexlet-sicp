@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card">
        <h1 class="h4 text-center card-header p-3">
          {{ __('passwords.reset_password.form_header') }}
        </h1>
        <div class="card-body mb-3">
            @if($errors->any())
            <div class="alert alert-danger" role="alert">
              {{ $errors->first() }}
            </div>
            @endif
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
          {{ html()->form()->action(route('password.email'))->open() }}
          <div class="mb-3">
            {{ html()->label(__(__('passwords.reset_password.email')))->for('email')->class('form-label') }}
            {{ html()->email('email')->class(['form-control', 'is-invalid' => $errors->has('email')]) }}
            @error('email')
            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
            @enderror
          </div>
          {{ html()->submit(__('passwords.reset_password.button_send_link'))->class('btn btn-primary btn-block') }}
          {{ html()->form()->close() }}
        </div>
      </div>
    </div>
  </div>
@endsection
