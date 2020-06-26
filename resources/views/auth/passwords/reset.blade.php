@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('passwords.reset_password.form_header') }}</div>

            <div class="card-body">
                {!! Form::open()->route('password.update')->attrs(['class' => 'd-flex flex-column align-items-center']) !!}

                    {!!Form::hidden('token', $token)!!}

                    {!! Form::text('email', __('passwords.reset_password.email'), $email ?? old('email'))->wrapperAttrs(['class' => 'col-sm-6']) !!}

                    {!! Form::text('password', __('passwords.reset_password.password'))->type('password')->wrapperAttrs(['class' => 'col-sm-6']) !!}

                    {!! Form::text('password_confirmation', __('passwords.reset_password.confirm_password'))->type('password')->wrapperAttrs(['class' => 'col-sm-6']) !!}

                    <div class="form-group col-sm-6 mb-0">
                        {!! Form::submit(__('passwords.reset_password.button')) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
