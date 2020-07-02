@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <h1 class="h4 text-center card-header p-3">
                {{ __('passwords.reset_password.form_header') }}
            </h1>
            <div class="card-body mb-3">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {!! Form::open()->route('password.email') !!}
                    {!!
                        Form::text('email', __('passwords.reset_password.email'))
                    !!}

                    <div class="flex-row mt-4">
                        {!! Form::submit(__('passwords.reset_password.button_send_link'))->block() !!}
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
