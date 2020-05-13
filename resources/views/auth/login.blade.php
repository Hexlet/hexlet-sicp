@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1 class="h4">{{ __('layout.login.form_header') }}</h1></div>
                    <div class="card-body">
                        {!! Form::open()->route('login')->attrs(['class' => 'd-flex flex-column align-items-center']) !!}
                        {!! Form::text('email', __('layout.login.email'))->wrapperAttrs(['class' => 'col-sm-6']) !!}
                        {!! Form::text('password', __('layout.login.password'))->type('password')->wrapperAttrs(['class' => 'col-sm-6']) !!}
                        <div class="form-group col-sm-6 mb-2">
                            {!! Form::checkbox('remember', __('layout.login.remember_me')) !!}
                        </div>
                        <div class="form-group col-sm-6 mb-0">
                            {!! Form::submit(__('layout.login.button')) !!}
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('layout.login.reset_password') }}
                            </a>
                            @endif
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        @include('components.social_login')
    </div>
@endsection
