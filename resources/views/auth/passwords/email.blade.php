@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open()->route('password.email') !!}
                        {!!
                            Form::text('email', __('E-Mail Address'))
                                ->wrapperAttrs(['class' => 'col-sm-6'])
                        !!}

                        <div class="form-group col-sm-6 mb-0">
                            {!! Form::submit(__('Send Password Reset Link')) !!}
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
