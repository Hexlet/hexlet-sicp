@php
/**
 * @var \Illuminate\Database\Eloquent\Model $model
 * @var string $modalTitle
 * @var string $content
 * @var string $submitLabel
 * @var string $method
 */
@endphp
<div class="modal fade" id="comment-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open()->route('comments.update', ['comment' => $comment])->method($method) !!}
            <div class="modal-header">
                <h5 class="modal-title">{{ __($modalTitle) }}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::hidden('commentable_type', $comment->commentable_type) !!}
                {!! Form::hidden('commentable_id', $comment->commentable_id) !!}
                {!! Form::textarea('content', __('comment.update_comment_here'), $content)->attrs(['rows' => 3])->required() !!}
            </div>
            <div class="modal-footer text-left">
                {!! Form::submit(__($submitLabel), 'success btn-sm text-uppercase') !!}
                {!! Form::button(__('comment.cancel'), 'secondary btn-sm text-uppercase  mr-auto')->attrs(['data-dismiss' => 'modal']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
