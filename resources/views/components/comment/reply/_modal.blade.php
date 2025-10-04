<div class="modal fade" id="reply-modal-{{ $comment->id }}" tabindex="-1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ __('comment.reply_to_comment') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        {{ html()->form(action: route('comments.store'))->open() }}
        {{ html()->hidden('commentable_type')->value($comment->commentable_type) }}
        {{ html()->hidden('commentable_id')->value($comment->commentable_id) }}
        {{ html()->hidden('parent_id')->value($comment->id) }}
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
        {{ html()->submit(__('comment.reply'))->class('btn btn-success btn-sm text-uppercase') }}
        {{ html()->button(__('comment.cancel'))->type('button')->class('btn btn-secondary btn-sm text-uppercase mr-auto')->data('bs-dismiss', 'modal') }}
      </div>
      {{ html()->form()->close() }}
    </div>
  </div>
</div>
