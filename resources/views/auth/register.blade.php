@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-10 col-lg-6 offset-md-1 offset-lg-3">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col col-md-10 col-lg-6 offset-md-1 offset-lg-3">
            <div class="card">
                <div class="card-header">
                    <h3>@lang('register.title')</h3>
                </div>
                <div class="card-body">
                    {!! Form::open()->route('register') !!}

                        {!! Form::text('email', __('register.emailPlaceholder')) !!}

                        {!! Form::text('name', __('register.namePlaceholder')) !!}

                        {!! Form::text('password', __('register.passwordPlaceholder'))->type('password') !!}

                        {!! Form::text('password_confirmation', __('register.passwordConfirmationPlaceholder'))->type('password') !!}

                        <div class="form-group mb-0">
                            {!! Form::submit(__('register.registerButton')) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col col-md-10 col-lg-6 offset-md-1 offset-lg-3">
            <div class="card">
                <div class="card-body">
                    <span>@lang('register.accountExists')</span>
                    <span class="ml-1"><a href="{{ route('login') }}">@lang('register.logIn')</a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col center">
            <h4 class="text-center text-uppercase">@lang('register.or')</h4>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col col-md-10 col-lg-6 offset-md-1 offset-lg-3">
            <div class="card text-white">
                <div class="card-body pagination-centered text-center">
                    <a href="{{ route('oauth.github') }}" class="btn btn-outline-secondary">
                        <img src="{{ url('icons/octoface.svg') }}"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
