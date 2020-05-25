@php
/**
 * @var \App\Comment $comment
 */
@endphp

<div id="comment-{{ $comment->id }}" class="media">
    <div class="media-body rounded-lg p-2 {{ $loop->last ? '' : 'mb-3' }}">
        <h5 class="mt-0 mb-1">
            <div class="d-flex justify-content-between">
                <div>
                    <a href="{{ getCommentLink($comment) }}" class="small">#</a>
                    {{ $comment->user->name }}
                    @if ($comment->isReply())
                        <span class="small">
                            <span class="text-lowercase">{{ __('comment.replied_to') }}</span>
                            {{ $comment->parent->user->name }}
                            <a href="{{ getCommentLink($comment->parent) }}">#</a>
                        </span>
                    @endif
                </div>
                <div class="text-muted small">{{ $comment->created_at->diffForHumans() }}</div>
            </div>
        </h5>
        @if ($comment->isReply())
            <div class="border my-2">
                <div class="small text-muted ml-2">{{ $comment->parent->content }}</div>
            </div>
        @endif
        <div class="my-2">{{ $comment->content }}</div>
        <div>
            @can('reply', $comment)
                <button
                    data-toggle="modal"
                    data-target="#reply-modal-{{ $comment->id }}"
                    class="btn btn-sm btn-link text-uppercase p-0 mr-2">
                    {{ __('comment.reply') }}
                </button>
            @endcan
            @can('update', $comment)
                <button data-toggle="modal"
                        data-target="#comment-modal-{{ $comment->id }}"
                        class="btn btn-sm btn-link text-uppercase p-0 mr-2">
                    {{ __('comment.edit') }}
                </button>
            @endcan
            @can('delete', $comment)
                <a href="{{ route('comments.destroy', $comment) }}"
                   class="btn btn-sm btn-link text-danger text-uppercase p-0"
                   data-confirm="Are you sure?"
                   data-method="delete"
                   rel="nofollow">
                    {{ __('comment.delete') }}
                </a>
            @endcan
        </div>
        @can('update', $comment)
            @include('components.comment._modal', [
                'modalTitle' => 'comment.edit_comment',
                'comment' => $comment,
                'method' => 'PUT',
                'content' => $comment->content,
                'submitLabel' => 'comment.update',
                ])
        @endcan
        @can('reply', $comment)
            @include('components.comment.reply._modal')
        @endcan
    </div>
</div>

