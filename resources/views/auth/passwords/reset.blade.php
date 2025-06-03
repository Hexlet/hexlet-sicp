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
          {{ html()->hidden('token')->value($token) }}
          <x-bs.form.text name="email" label="passwords.reset_password.email" />
          <x-bs.form.password name="password" label="passwords.reset_password.password" />
          <x-bs.form.password name="password_confirmation" label="passwords.reset_password.confirm_password" />
          <x-bs.form.submit label='passwords.reset_password.button' />
          {{ html()->form()->close() }}
        </div>
      </div>
    </div>
  </div>
@endsection
