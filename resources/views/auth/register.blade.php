@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endforeach
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h1 class="h4">{{ __('register.title') }}</h1>
            </div>
            <div class="card-body">
                {!! Form::open()->route('register')->attrs(['class' => 'd-flex flex-column align-items-center']) !!}
                    {!! Form::text('email', __('register.emailPlaceholder'))->wrapperAttrs(['class' => 'col-sm-6']) !!}
                    {!! Form::text('name', __('register.namePlaceholder'))->wrapperAttrs(['class' => 'col-sm-6']) !!}
                    {!! Form::text('password', __('register.passwordPlaceholder'))->type('password')->wrapperAttrs(['class' => 'col-sm-6']) !!}
                    {!! Form::text('password_confirmation', __('register.passwordConfirmationPlaceholder'))->type('password')->wrapperAttrs(['class' => 'col-sm-6']) !!}
                    <div class="form-group mb-0 col-sm-6">
                        {!! Form::submit(__('register.registerButton')) !!}
                        <span class="ml-2">{{ __('register.accountExists') }} <a href="{{ route('login') }}">{{ __('register.logIn') }}</a></span>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@include('components.social_login')
@endsection
