@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <h1 class="h4 text-center card-header p-3">
                    {{ __('passwords.reset_password.form_header') }}
                </h1>
                <div class="card-body mb-3">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ BsForm::open(route('password.email')) }}
                    {{ BsForm::text('email')->label(__('passwords.reset_password.email')) }}

                    <div class="mt-4">
                        {{ BsForm::submit(__('passwords.reset_password.button_send_link'))->attribute('class', 'btn btn-primary btn-block') }}
                    </div>

                    {{ BsForm::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
