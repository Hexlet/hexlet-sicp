@extends('layouts..app')
@section('content')
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <h1 class="h4 text-center card-header p-3">
                    {{ __('layout.login.form_header') }}
                </h1>
                <div class="card-body">
                    {{ BsForm::open(route('login')) }}
                    {{ BsForm::email('email')->label(__('layout.login.email')) }}
                    {{ BsForm::password('password')->label(__('layout.login.password')) }}
                    {{ BsForm::checkbox('remember')->label(__('layout.login.remember_me')) }}
                    {{ BsForm::submit(__('layout.login.button'))->attribute('class', 'btn btn-primary btn-block') }}
                    <div class="mt-2">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('layout.login.reset_password') }}
                            </a>
                        @endif
                    </div>
                    {{ BsForm::close() }}
                </div>
                <div class="card-footer p-4 text-center bg-transparent">
                    @include('components.social_login')
                </div>
            </div>
        </div>
    </div>
@endsection
