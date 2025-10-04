@php
  /**
   * @var \Illuminate\Database\Eloquent\Model $model
   * @var int $maxLength
   */
@endphp
<div class="card">
  <div class="card-body">
    {{ html()->form(action: route('comments.store'))->open() }}
    {{ html()->hidden('commentable_type')->value(get_class($model)) }}
    {{ html()->hidden('commentable_id')->value($model->id) }}
    <div class="form-floating">
      {{ html()
        ->textarea('content')
        ->class('form-control x-min-h-100px')
        ->attribute('maxlength', $maxCommentLength)
        ->required() }}
      <label for="content" class="w-100 text-wrap">{{ __('comment.enter_your_message', ['max' => $maxCommentLength]) }}</label>
    </div>
    <div class="mt-3">
      {{ html()->submit(__('comment.submit'))->class('btn btn-success btn-sm text-uppercase') }}
    </div>
    {{ html()->form()->close() }}
  </div>
</div>
<br />
