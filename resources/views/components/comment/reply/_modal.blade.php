<div class="modal fade" id="reply-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open()->route('comments.store') !!}
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('comment.reply_to_comment') }}</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::hidden('commentable_type', $comment->commentable_type) !!}
                    {!! Form::hidden('commentable_id', $comment->commentable_id) !!}
                    {!! Form::hidden('parent_id', $comment->id) !!}
                    {!! Form::textarea('content', __('comment.enter_your_message'))->attrs(['rows' => 5])->required() !!}
                </div>
                <div class="modal-footer">
                    {!! Form::submit(__('comment.reply'), 'success btn-sm text-uppercase') !!}
                    {!! Form::button(__('comment.cancel'), 'secondary btn-sm text-uppercase  mr-auto')->attrs(['data-dismiss' => 'modal']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
