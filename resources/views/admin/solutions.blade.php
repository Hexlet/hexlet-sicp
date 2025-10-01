@extends('layouts.app')

@php
    use App\Helpers\MarkdownHelper;
@endphp


@section('title', __('admin.solutions.title'))

@section('content')

    <div class="row my-4">
        <div class="col-md-3 col-lg-2">
            @include('admin.partials.navigation')
        </div>
        <div class="col-md-9 col-lg-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h2">{{ __('admin.solutions.title') }}</h1>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="text-muted">
                        {{ __('admin.solutions.total') }}: {{ $solutions->total() }}
                    </div>
                </div>
            </div>

            @include('admin.partials.search-form', ['action' => route('admin.solutions.index')])

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
                                            <div>
                                                <a href="{{ route('users.show', $solution->user) }}">
                                                    <strong>{{ $solution->user->name }}</strong>
                                                </a>
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
                                                {{ mb_substr($solution->content, 0, 100) }} &#8230;
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
                                        {{ __('admin.solutions.empty') }}
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
