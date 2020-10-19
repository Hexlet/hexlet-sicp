@php
/**
 * @var \Illuminate\Database\Eloquent\Model $model
 * @var string $modalTitle
 * @var string $content
 * @var string $submitLabel
 * @var string $method
 */
@endphp
<div class="modal fade" id="comment-modal-{{ $comment->id }}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {{ BsForm::open(route('comments.update', ['comment' => $comment]), ['method' => $method]) }}
            <div class="modal-header">
                <h5 class="modal-title">{{ __($modalTitle) }}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::hidden('commentable_type', $comment->commentable_type) }}
                {{ Form::hidden('commentable_id', $comment->commentable_id) }}
                {{ BsForm::textarea('content', $comment->content)->label(__('comment.update_comment_here'))->required()->attribute('rows', 3) }}
            </div>
            <div class="modal-footer text-left">
                {{ BsForm::submit(__($submitLabel))->attribute('class', 'btn btn-success btn-sm text-uppercase') }}
                {{ Form::button(__('comment.cancel'), ['class' => 'btn btn-secondary btn-sm text-uppercase  mr-auto', 'data-dismiss' => 'modal']) }}
            </div>
            {{ BsForm::close() }}
        </div>
    </div>
</div>
