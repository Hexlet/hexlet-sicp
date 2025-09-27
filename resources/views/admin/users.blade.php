@extends('layouts.app')

@section('title', __('admin.users.title'))

@section('content')

    <div class="row my-4">
        <div class="col-12">
            @include('admin.partials.navigation')

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h2">{{ __('admin.users.title') }}</h1>
                <div class="text-muted">
                    {{ __('admin.users.total') }}: {{ $users->total() }}
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>{{ __('admin.users.table.id') }}</th>
                                <th>{{ __('admin.users.table.name') }}</th>
                                <th>{{ __('admin.users.table.email') }}</th>
                                <th>{{ __('admin.users.table.comments') }}</th>
                                <th>{{ __('admin.users.table.solutions') }}</th>
                                <th>{{ __('admin.users.table.created') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $user->present()->getProfileImageLink() }}"
                                                 alt="{{ $user->name }}"
                                                 class="rounded-circle me-2"
                                                 width="30" height="30">
                                            <div>
                                                <div>
                                                    <a href="{{ route('users.show', $user) }}">
                                                        <strong>{{ $user->name ?: __('admin.not_available') }}</strong>
                                                    </a>
                                                </div>
                                                <div class="small text-muted">
                                                    @if($user->github_name)
                                                        <a href="https://github.com/{{ $user->github_name }}"
                                                           target="_blank"
                                                           class="text-muted text-decoration-none me-2">
                                                            <i class="bi bi-github"></i> {{ $user->github_name }}
                                                        </a>
                                                    @endif
                                                    @if($user->hexlet_nickname)
                                                        <a href="https://ru.hexlet.io/u/{{ $user->hexlet_nickname }}"
                                                           target="_blank"
                                                           class="text-muted text-decoration-none">
                                                            <img class="mb-3"
                                                                 src={{ Vite::asset('resources/assets/images/hexlet_logo.png') }} width="10"
                                                                 height="20" alt="Hexlet logo">
                                                            {{ $user->hexlet_nickname }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="text-break">{{ $user->email ?: __('admin.users.not_available') }}</span>
                                        @if($user->email_verified_at)
                                            <i class="bi bi-check-circle-fill text-success ms-1"
                                               title="{{ __('admin.users.status.email_verified') }}"></i>
                                        @else
                                            <i class="bi bi-exclamation-circle-fill text-warning ms-1"
                                               title="{{ __('admin.users.status.email_not_verified') }}"></i>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->comments_count > 0)
                                            <a href="{{ route('admin.comments.index', ['user_id' => $user->id]) }}" class="badge bg-success text-decoration-none">{{ $user->comments_count }}</a>
                                        @else
                                            <span class="badge bg-warning">{{ $user->comments_count }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->solutions_count > 0)
                                            <a href="{{ route('admin.solutions.index', ['user_id' => $user->id]) }}" class="badge bg-success text-decoration-none">{{ $user->solutions_count }}</a>
                                        @else
                                            <span class="badge bg-warning">{{ $user->solutions_count }}</span>
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
