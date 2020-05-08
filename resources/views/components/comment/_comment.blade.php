@php
/**
 * @var \App\Comment $comment
 */
@endphp
<div id="comment-{{ $comment->id }}" class="media">
    <div class="mr-3"></div>
    <div class="media-body">
        <h5 class="mt-0 mb-1">
            <a href="{{ getCommentLink($comment) }}" class="small">#</a>
            {{ $comment->user->name }}
            <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small>
        </h5>
        <span>{{ $comment->content }}</span>
        <div>
            @can('reply', $comment)
                <button
                    data-toggle="modal"
                    data-target="#reply-modal-{{ $comment->id }}"
                    class="btn btn-sm btn-link text-uppercase">
                    {{ __('comment.reply') }}
                </button>
            @endcan
            @can('update', $comment)
                <button data-toggle="modal"
                        data-target="#comment-modal-{{ $comment->id }}"
                        class="btn btn-sm btn-link text-uppercase">
                    {{ __('comment.edit') }}
                </button>
            @endcan
            @can('delete', $comment)
                <a href="{{ route('comments.destroy', $comment) }}"
                   class="btn btn-sm btn-link text-danger text-uppercase"
                   data-confirm="Вы уверены?"
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
        <br>
    </div>
</div>
