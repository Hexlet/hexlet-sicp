@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">{{ __('register.title') }}</h4>
            </div>
            <div class="card-body">
                {!! Form::open()->route('register') !!}
                    {!! Form::text('email', __('register.emailPlaceholder')) !!}
                    {!! Form::text('name', __('register.namePlaceholder')) !!}
                    {!! Form::text('password', __('register.passwordPlaceholder'))->type('password') !!}
                    {!! Form::text('password_confirmation', __('register.passwordConfirmationPlaceholder'))->type('password') !!}
                    <div class="form-group mt-4">
                        {!! Form::submit(__('register.registerButton')) !!}
                        <a class="btn btn-link float-right" href="{{ route('login') }}">
                            {{ __('register.accountExists') }}
                            {{ __('register.logIn') }}
                        </a>
                    </div>
                {!! Form::close() !!}
            </div>
            <div class="card-footer p-4 d-flex justify-content-center bg-transparent">
                @include('components.social_login')
            </div>
        </div>
    </div>
</div>
@endsection
