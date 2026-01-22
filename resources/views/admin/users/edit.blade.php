@extends('layouts.app')

@section('title', __('admin.users.edit_user', ['name' => $user->name]))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        {{-- Админское меню --}}
        <div class="list-group">
          <a href="{{ route('admin.users.index') }}"
             class="list-group-item list-group-item-action {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            {{ __('admin.users.title') }}
          </a>
          <a href="{{ route('admin.comments.index') }}"
             class="list-group-item list-group-item-action {{ request()->routeIs('admin.comments.*') ? 'active' : '' }}">
            {{ __('admin.comments.title') }}
          </a>
          <a href="{{ route('admin.solutions.index') }}"
             class="list-group-item list-group-item-action {{ request()->routeIs('admin.solutions.*') ? 'active' : '' }}">
            {{ __('admin.solutions.title') }}
          </a>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">
              {{ __('admin.users.edit') }}
            </h5>
          </div>
          <div class="card-body">
            {{ html()->modelForm($user, 'PUT', route('admin.users.update', $user))->open() }}

            <div class="mb-3">
              {{ html()->label(__('account.name'), 'name')->class('form-label') }}
              {{ html()->text('name')
                  ->class('form-control')
                  ->required() }}
            </div>

            <div class="mb-3">
              {{ html()->label(__('account.github_name'), 'github_name')->class('form-label') }}
              {{ html()->text('github_name')
                  ->class('form-control') }}
            </div>

            <div class="mb-3">
              <div class="form-check">
                {{ html()->checkbox('admin')
                    ->class('form-check-input')
                    ->value(1)
                    ->checked($user->is_admin) }}
                {{ html()->label(__('account.admin'), 'admin')
                    ->class('form-check-label') }}
              </div>
            </div>

            <div class="d-flex gap-2">
              <button type="submit" class="btn btn-primary">
                {{ __('layout.common.save') }}
              </button>
              <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                {{ __('layout.common.cancel') }}
              </a>
            </div>

            {{ html()->closeModelForm() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
