<div class="modal fade" id="reply-modal-{{ $comment->id }}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ BsForm::open(route('comments.store')) }}
            <div class="modal-header">
                <h5 class="modal-title">{{ __('comment.reply_to_comment') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                {{ Form::hidden('commentable_type', $comment->commentable_type) }}
                {{ Form::hidden('commentable_id', $comment->commentable_id) }}
                {{ Form::hidden('parent_id', $comment->id) }}
                {{ BsForm::textarea('content')->label(__('comment.enter_your_message'))->required()->attribute(['rows' => 5, "class" => "form-control mb-3"]) }}
            </div>
            <div class="modal-footer text-start">
                {{ BsForm::submit(__('comment.reply'))->attribute('class', 'btn btn-success btn-sm text-uppercase') }}
                {{ Form::button(__('comment.cancel'), ['class' => 'btn btn-secondary btn-sm text-uppercase  me-auto', 'data-bs-dismiss' => 'modal']) }}
            </div>
            {{ BsForm::close() }}
        </div>
    </div>
</div>
