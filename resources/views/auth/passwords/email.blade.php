@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('passwords.reset_password.form_header') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {!! Form::open()->route('password.email') !!}
                    {!!
                        Form::text('email', __('passwords.reset_password.email'))
                            ->wrapperAttrs(['class' => 'col-sm-6'])
                    !!}

                    <div class="form-group col-sm-6 mb-0">
                        {!! Form::submit(__('passwords.reset_password.button_send_link')) !!}
                    </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>
@endsection
