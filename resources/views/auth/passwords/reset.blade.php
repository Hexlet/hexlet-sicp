@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    {!! Form::open()->route('password.update')->attrs(['class' => 'd-flex flex-column align-items-center']) !!}

                        {!!Form::hidden('token', $token)!!}

                        {!! Form::text('email', __('E-Mail Address'), $email ?? old('email'))->wrapperAttrs(['class' => 'col-sm-6']) !!}

                        {!! Form::text('password', __('Password'))->type('password')->wrapperAttrs(['class' => 'col-sm-6']) !!}

                        {!! Form::text('password_confirmation', __('Confirm Password'))->type('password')->wrapperAttrs(['class' => 'col-sm-6']) !!}

                        <div class="form-group col-sm-6 mb-0">
                            {!! Form::submit(__('Reset Password')) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
