@extends('layouts.bootstrap5.app')

@section('content')
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <h1 class="h43text-center card-header p-3">
                    {{ __('register.title') }}
                </h1>
                <div class="card-body">
                    {{ BsForm::open(route('register')) }}
                    {{ BsForm::email('email')->label(__('register.emailPlaceholder')) }}
                    {{ BsForm::text('name')->label(__('register.namePlaceholder')) }}
                    {{ BsForm::password('password')->label(__('register.passwordPlaceholder')) }}
                    {{ BsForm::password('password_confirmation')->label(__('register.passwordConfirmationPlaceholder')) }}
                    <div class="mt-4">
                        {{ BsForm::submit(__('register.registerButton'))->attribute('class', 'btn btn-primary btn-block') }}
                        <div class="mt-2">
                            <a href="{{ route('login') }}">
                                {{ __('register.accountExists') }}
                                {{ __('register.logIn') }}
                            </a>
                        </div>
                    </div>
                    {{ BsForm::close() }}
                </div>
                <div class="card-footer p-2 text-center bg-transparent">
                    @include('components.social_login')
                </div>
            </div>
        </div>
    </div>
@endsection
