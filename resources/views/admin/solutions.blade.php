@extends('layouts.app')

@php
    use App\Helpers\MarkdownHelper;
@endphp


@section('title', __('admin.solutions.title'))

@section('content')

    <div class="row my-4">
        <div class="col-12">
            @include('admin.partials.navigation')

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h2">{{ __('admin.solutions.title') }}</h1>
                    @if($user)
                        <p class="text-muted mb-0">{{ __('admin.solutions.by_user') }} {{ $user->name }}</p>
                    @endif
                </div>
                <div class="d-flex align-items-center gap-3">
                    @if($user)
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-arrow-left"></i> {{ __('admin.solutions.back_to_users') }}
                        </a>
                    @endif
                    <div class="text-muted">
                        {{ __('admin.solutions.total') }}: {{ $solutions->total() }}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                            <tr>
                                <th width="5%">{{ __('admin.solutions.table.id') }}</th>
                                <th width="20%">{{ __('admin.solutions.table.user') }}</th>
                                <th width="15%">{{ __('admin.solutions.table.exercise') }}</th>
                                <th width="40%">{{ __('admin.solutions.table.content') }}</th>
                                <th width="10%">{{ __('admin.solutions.table.created') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($solutions as $solution)
                                <tr>
                                    <td>{{ $solution->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $solution->user->present()->getProfileImageLink() }}"
                                                 alt="{{ $solution->user->name }}"
                                                 class="rounded-circle me-2"
                                                 width="30" height="30">
                                            <div>
                                                <a href="{{ route('users.show', $solution->user) }}">
                                                    <strong>{{ $solution->user->name ?: __('admin.not_available') }}</strong>
                                                </a>
                                                @if(!$user)
                                                    <div class="small">
                                                        <a href="{{ route('admin.solutions.index', ['filter[user_id]' => $solution->user->id]) }}"
                                                           class="text-muted text-decoration-none">
                                                            {{ __('admin.solutions.view_all_user_solutions') }}
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="{{ route('exercises.show', $solution->exercise) }}" class="fw-bold">
                                                {{ $solution->exercise->path }}
                                            </a>
                                            <div class="small text-muted">
                                                {{ $solution->exercise->getTitle() }}
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="solution-content" style="max-width: 300px;">
                                            <a href="{{ route('users.solutions.show', [$solution->user, $solution]) }}">
                                                {{ mb_substr(MarkdownHelper::text($solution->content), 0, 100) }} &#8230;
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ $solution->created_at->format('d.m.Y H:i') }}
                                        </small>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        @if($user)
                                            {{ __('admin.solutions.empty_user') }}
                                        @else
                                            {{ __('admin.solutions.empty') }}
                                        @endif
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            @if($solutions->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $solutions->appends(request()->query())->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
