@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <h1 class="h4 text-center card-header">
                {{ __('passwords.reset_password.form_header') }}
            </h1>
            <div class="card-body">
                {!! Form::open()->route('password.update') !!}

                    {!!Form::hidden('token', $token)!!}

                    {!! Form::text('email', __('passwords.reset_password.email'), $email ?? old('email')) !!}

                    {!! Form::text('password', __('passwords.reset_password.password'))->type('password') !!}

                    {!! Form::text('password_confirmation', __('passwords.reset_password.confirm_password'))->type('password') !!}

                    <div class="form-group mt-4">
                        {!! Form::submit(__('passwords.reset_password.button')) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
