@extends('layouts.app')
@php
/**
 * @var \App\User $user
 */
@endphp
@section('content')
<div class="row my-4">
    @include('account._menu')
        <div class="col-12 col-md-9">
            <h3>
                @lang('account.profile'): {{ $user->email }}
            </h3>
            <div class="card">
                <div class="card-header">
                    @lang('account.сhange_name')
                </div>
                <div class="card-body">
                    {!! Form::open()->patch()->route('account.update', [$user]) !!}
                    {!! Form::text('name', __('register.namePlaceholder'))->value($user->name) !!}
                    <div class="form-group mb-0">
                        {!! Form::submit(__('Save')) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
</div>
@endsection
