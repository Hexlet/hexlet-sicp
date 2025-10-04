@php
  /**
   * @var \App\Models\Comment $comment
   */
  use App\Helpers\MarkdownHelper;
@endphp
<div id="comment-{{ $comment->id }}" class="media">
  <div class="media-body rounded-lg p-2 {{ $loop->last ? '' : 'mb-3' }}">
    <h5 class="mt-0 mb-1">
      <div class="d-flex justify-content-between">
        <div>
          <a href="{{ $comment->present()->getLink() }}" class="small">#</a>
          <!-- FIXME: add softdelete users, and comments  -->
          {{ $comment?->user?->name }}
          @if ($comment->isReply())
            <span class="small">
              <span class="text-lowercase">{{ __('comment.replied_to') }}</span>
              {{ $comment->parent->user->name }}
              <a href="{{ $comment->parent->present()->getLink() }}">#</a>
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
    <div class="my-2 text-break">{!! MarkdownHelper::text($comment->content) !!}</div>
    <div>
      @can('reply', $comment)
        <button data-bs-toggle="modal" data-bs-target="#reply-modal-{{ $comment->id }}"
          class="btn btn-sm btn-link text-uppercase p-0 mr-2">
          {{ __('comment.reply') }}
        </button>
      @endcan
      @can('update', $comment)
        <button data-bs-toggle="modal" data-bs-target="#comment-modal-{{ $comment->id }}"
          class="btn btn-sm btn-link text-uppercase p-0 mr-2">
          {{ __('comment.edit') }}
        </button>
      @endcan
      @can('delete', $comment)
        <a href="{{ route('comments.destroy', $comment) }}" class="btn btn-sm btn-link text-danger text-uppercase p-0"
          data-confirm="Are you sure?" data-method="delete" rel="nofollow">
          {{ __('comment.delete') }}
        </a>
      @endcan
    </div>
    @can('update', $comment)
      <div class="modal fade" id="comment-modal-{{ $comment->id }}" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            {{ html()->modelForm($comment, 'PUT', route('comments.update', ['comment' => $comment]))->open() }}
            <div class="modal-header">
              <h5 class="modal-title">{{ __('comment.edit_comment') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              {{ html()->hidden('commentable_type') }}
              {{ html()->hidden('commentable_id') }}
              <div class="form-floating">
                {{ html()
                  ->textarea('content')
                  ->class('form-control x-min-h-300px')
                  ->attribute('maxlength', $maxCommentLength)
                  ->required() }}
                <label for="content" class="w-100 text-wrap">{{ __('comment.enter_your_message', ['max' => $maxCommentLength]) }}</label>
              </div>
            </div>
            <div class="modal-footer text-left">
              {{ html()->submit(__('comment.update'))->class('btn btn-success btn-sm text-uppercase') }}
              {{ html()->button(__('comment.cancel'))->type('button')->class(
                      'btn btn-secondary btn-sm text-uppercase
                          mr-auto',
                  )->data('bs-dismiss', 'modal') }}
            </div>
            {{ html()->closeModelForm() }}
          </div>
        </div>
      </div>
    @endcan
    @can('reply', $comment)
      @include('components.comment.reply._modal', ['maxCommentLength' => $maxCommentLength])
    @endcan
  </div>
</div>
