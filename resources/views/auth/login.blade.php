@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        {!! Form::open()->route('login')->attrs(['class' => 'd-flex flex-column align-items-center']) !!}

                        {!! Form::text('email', __('E-Mail Address'))->wrapperAttrs(['class' => 'col-sm-6']) !!}

                        {!! Form::text('password', __('Password'))->type('password')->wrapperAttrs(['class' => 'col-sm-6']) !!}

                        <div class="form-group col-sm-6 mb-2">
                            {!! Form::checkbox('remember', __('Remember Me')) !!}
                        </div>

                        <div class="form-group col-sm-6 mb-0">
                            {!! Form::submit(__('Login')) !!}

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col center">
                <h4 class="text-center text-uppercase">@lang('register.or')</h4>
            </div>
        </div>
        @include('components.social_login')
    </div>
@endsection
