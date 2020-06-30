@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header"><h1 class="h4 text-center">{{ __('layout.login.form_header') }}</h1></div>
            <div class="card-body">
                {!! Form::open()->route('login') !!}
                    {!! Form::text('email', __('layout.login.email')) !!}
                    {!! Form::text('password', __('layout.login.password'))->type('password') !!}
                <div class="form-group">
                    {!! Form::checkbox('remember', __('layout.login.remember_me')) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit(__('layout.login.button')) !!}
                    @if (Route::has('password.request'))
                    <a class="btn btn-link float-right" href="{{ route('password.request') }}">
                        {{ __('layout.login.reset_password') }}
                    </a>
                    @endif
                </div>
                {!! Form::close() !!}
            </div>
            <div class="card-footer d-flex justify-content-center bg-transparent">
                <a href="{{ route('oauth.github') }}" class="btn btn-outline-secondary m-3">
                    {{ __('auth.with_github') }}
                    <img src="{{ url('icons/octoface.svg') }}" alt="" />
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
