@extends('layouts.app')

@section('title', __('admin.users.title'))

@section('content')

    <div class="row my-4">
        <div class="col-md-3 col-lg-2">
            @include('admin.partials.navigation')
        </div>
        <div class="col-md-9 col-lg-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2">{{ __('admin.users.title') }}</h1>
                <div class="text-muted">
                    {{ __('admin.users.total') }}: {{ $users->total() }}
                </div>
            </div>

            @include('admin.partials.search-form', ['action' => route('admin.users.index')])

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>{{ __('admin.users.table.id') }}</th>
                                <th>{{ __('admin.users.table.name') }}</th>
                                <th>{{ __('admin.users.table.email') }}</th>
                                <th>{{ __('admin.users.table.role') }}</th>
                                <th>{{ __('admin.users.table.created') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <div>
                                                    <a href="{{ route('users.show', $user) }}">
                                                        <strong>{{ $user->name }}</strong>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-break">{{ $user->email }}</span>
                                        @if($user->email_verified_at)
                                            <i class="bi bi-check-circle-fill text-success ms-1"
                                               title="{{ __('admin.users.status.email_verified') }}"></i>
                                        @else
                                            <i class="bi bi-exclamation-circle-fill text-warning ms-1"
                                               title="{{ __('admin.users.status.email_not_verified') }}"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->is_admin)
                                            <span class="badge bg-danger">
                                                <i class="bi bi-shield-fill-check"></i> {{ __('admin.users.role.admin') }}
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">{{ __('admin.users.role.user') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ $user->created_at->format('d.m.Y H:i') }}
                                        </small>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center py-4 text-muted">
                                        {{ __('admin.users.empty') }}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if($users->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
