@extends('layouts.app')

@section('content')
<div class="row my-4">
    @include('account._menu')
    <div class="col-12 col-md-9 my-4">
        <h3>{{ __('account.profile') }}: {{ $user->email }}</h3>
        <div class="card">
            <div class="card-header">{{ __('account.delele_account') }}</div>
            <div class="card-body">
                <a href="<?= route('account.destroy', $user->id) ?>" class="btn btn-danger" data-method="delete" data-confirm="{{ __('account.are_you_sure') }}">{{ __('account.delele_account') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
