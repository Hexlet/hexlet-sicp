@extends('layouts.app')

@php
    use App\Helpers\MarkdownHelper;
@endphp

@section('title', __('admin.comments.title'))

@section('content')

    <div class="row my-4">
        <div class="col-12">
            @include('admin.partials.navigation')

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h2">{{ __('admin.comments.title') }}</h1>
                    @if($user)
                        <p class="text-muted mb-0">{{ __('admin.comments.by_user') }} {{ $user->name }}</p>
                    @endif
                </div>
                <div class="d-flex align-items-center gap-3">
                    @if($user)
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-arrow-left"></i> {{ __('admin.comments.back_to_users') }}
                        </a>
                    @endif
                    <div class="text-muted">
                        {{ __('admin.comments.total') }}: {{ $comments->total() }}
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>{{ __('admin.comments.table.id') }}</th>
                                <th>{{ __('admin.comments.table.user') }}</th>
                                <th>{{ __('admin.comments.table.commentable') }}</th>
                                <th>{{ __('admin.comments.table.content') }}</th>
                                <th>{{ __('admin.comments.table.created') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $comment->user->present()->getProfileImageLink() }}"
                                                 alt="{{ $comment->user->name }}"
                                                 class="rounded-circle me-2"
                                                 width="30" height="30">
                                            <div>
                                                <a href="{{ route('users.show', $comment->user) }}">
                                                    <strong>{{ $comment->user->name ?: 'N/A' }}</strong>
                                                </a>
                                                @if(!$user)
                                                    <div class="small">
                                                        <a href="{{ route('admin.comments.index', ['user_id' => $comment->user->id]) }}"
                                                           class="text-muted text-decoration-none">
                                                            {{ __('admin.comments.view_all_user_comments') }}
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($comment->commentable_type === 'App\Models\Chapter')
                                            <a href="{{ route('chapters.show', $comment->commentable) }}">
                                                <strong>{{ $comment->getCommentableName() }}</strong>
                                            </a>
                                        @elseif($comment->commentable_type === 'App\Models\Exercise')
                                            <a href="{{ route('exercises.show', $comment->commentable) }}">
                                                <strong>{{ $comment->getCommentableName() }}</strong>
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="comment-content" style="max-width: 300px;">
                                            <a href="{{ route('comments.show', $comment) }}">
                                                {{ mb_substr(MarkdownHelper::text($comment->content), 0, 100) }} &#8230;
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ $comment->created_at->format('d.m.Y H:i') }}
                                        </small>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4 text-muted">
                                        @if($user)
                                            {{ __('admin.comments.empty_user') }}
                                        @else
                                            {{ __('admin.comments.empty') }}
                                        @endif
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
