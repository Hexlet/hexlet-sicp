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
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        {{ Form::hidden('commentable_type', $comment->commentable_type) }}
        {{ Form::hidden('commentable_id', $comment->commentable_id) }}
        {{ BsForm::textarea('content', $comment->content)->label(__('comment.update_comment_here'))->required()->attribute('rows', 3) }}
      </div>
      <div class="modal-footer text-left">
        <a class="Link--muted position-relative d-inline"
          href="https://docs.github.com/github/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax"
          target="_blank" data-ga-click="Markdown Toolbar, click, help" id="dd_fc-new_comment_field_md_link"
          aria-labelledby="tooltip-1668341388600-6483">
          <svg aria-hidden="true" height="16" viewBox="0 0 16 16" version="1.1" width="16"
            data-view-component="true" class="octicon octicon-markdown v-align-bottom">
            <path fill-rule="evenodd"
              d="M14.85 3H1.15C.52 3 0 3.52 0 4.15v7.69C0 12.48.52 13 1.15 13h13.69c.64 0 1.15-.52 1.15-1.15v-7.7C16 3.52 15.48 3 14.85 3zM9 11H7V8L5.5 9.92 4 8v3H2V5h2l1.5 2L7 5h2v6zm2.99.5L9.5 8H11V5h2v3h1.5l-2.51 3.5z">
            </path>
          </svg>
        </a>
        {{ BsForm::submit(__($submitLabel))->attribute('class', 'btn btn-success btn-sm text-uppercase') }}
        {{ Form::button(__('comment.cancel'), ['class' => 'btn btn-secondary btn-sm text-uppercase  mr-auto', 'data-bs-dismiss' => 'modal']) }}
      </div>
      {{ BsForm::close() }}
    </div>
  </div>
</div>
