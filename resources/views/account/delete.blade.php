@extends('layouts.app')
@php
/**
 * @var \App\User $user
 */
@endphp
@section('content')
<div class="row my-4">
    @include('account._menu')
    <div class="col-12 col-md-9 my-4">
        <h3>
            {{ __('account.profile') }}: {{ $user->email }}
        </h3>
        <div class="card">
            <div class="card-header">
                {{ __('account.delete_account') }}
            </div>
            <div class="card-body">
                <a href="{{ route('account.destroy', $user) }}"
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
