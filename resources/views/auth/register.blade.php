@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <h1 class="h4 text-center card-header p-3">
                {{ __('register.title') }}
            </h1>
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
            <div class="card-footer p-4 text-center bg-transparent">
                @include('components.social_login')
            </div>
        </div>
    </div>
</div>
@endsection
