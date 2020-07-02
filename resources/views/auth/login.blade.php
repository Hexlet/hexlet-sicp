@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <h1 class="h4 text-center card-header p-3">
                {{ __('layout.login.form_header') }}
            </h1>
            <div class="card-body">
                {!! Form::open()->route('login') !!}
                    {!! Form::text('email', __('layout.login.email')) !!}
                    {!! Form::text('password', __('layout.login.password'))->type('password') !!}
                <div class="form-group">
                    {!! Form::checkbox('remember', __('layout.login.remember_me')) !!}
                </div>
                    {!! Form::submit(__('layout.login.button'))->block() !!}
                    <div class="mt-2">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('layout.login.reset_password') }}
                        </a>
                        @endif
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
