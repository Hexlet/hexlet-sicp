@extends('layouts..app')

@section('content')
<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <h1 class="h4 text-center card-header p-3">
                {{ __('passwords.reset_password.form_header') }}
            </h1>
            <div class="card-body mb-3">
                {{ BsForm::open(route('password.update')) }}
                {{ Form::hidden('token', $token) }}
                {{ BsForm::text('email', $email ?? old('email'))->label(__('passwords.reset_password.email')) }}

                {{ BsForm::password('password')->label(__('passwords.reset_password.password')) }}
                {{ BsForm::password('password_confirmation')->label(__('passwords.reset_password.confirm_password')) }}

                <div class="mt-4">
                    {{ BsForm::submit(__('passwords.reset_password.button'))->attribute('class', 'btn btn-primary btn-block') }}
                </div>

                {{ BsForm::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
