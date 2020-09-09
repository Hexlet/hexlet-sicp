@extends('layouts.app')
@php
/**
 * @var \App\User $user
 */
@endphp
@section('content')
<div class="row my-4">
    @include('settings._menu')
    <div class="col-12 col-md-9">
        <div class="card mb-2">
            <div class="card-body">
                <h3 class="card-title">{{ __('account.account') }}</h3>
                <p class="card-text">
                    {{ __('account.current_email') }}:
                    {{ $user->email }}
                </p>
            </div>
        </div>
        @if(!app()->environment('production'))
        <div class="card mb-2">
            <div class="card-body">
                <h3 class="card-title">Github Settings</h3>
                @if($user->githubAccount)
                    {!! Form::open()->route('users.github_account.update', [$user, $user->githubAccount])->patch() !!}
                    {!! Form::select('repository_name', 'Exercises repository', $githubRepositories) !!}
                    {!! Form::submit(__('layout.common.save'))->success() !!}
                    {!! Form::close() !!}
                @else
                    <a class="nav-link" href="{{ route('users.github_account.store', $user) }}" data-method="post" rel="nofollow">
                        Connect Github account
                    </a>
                @endif
            </div>
        </div>
        @endif
        <div class="card mb-2">
            <div class="card-body">
                <h3 class="card-title">{{ __('layout.login.password') }}</h3>
                <p class="card-text">
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('layout.login.reset_password') }}
                    </a>
                </p>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-body">
                <a href="{{ route('settings.account.destroy', $user) }}"
                   class="btn btn-danger"
                   data-method="delete"
                   data-confirm="{{ __('account.are_you_sure') }}">
                    {{ __('account.delete_account') }}
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
