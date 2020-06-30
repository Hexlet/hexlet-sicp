@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">
                    {{ __('passwords.reset_password.form_header') }}
                </h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {!! Form::open()->route('password.email') !!}
                    {!!
                        Form::text('email', __('passwords.reset_password.email'))
                    !!}

                    <div class="form-group mt-4">
                        {!! Form::submit(__('passwords.reset_password.button_send_link')) !!}
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
