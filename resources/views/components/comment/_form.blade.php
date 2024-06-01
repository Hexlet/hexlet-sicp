@php
  /**
   * @var \Illuminate\Database\Eloquent\Model $model
   */
@endphp
<div class="card">
  <div class="card-body">
    {{ html()->form(action: route('comments.store'))->open() }}
    {{ html()->hidden('commentable_type')->value(get_class($model)) }}
    {{ html()->hidden('commentable_id')->value($model->id) }}
    <div class="form-floating">
      {{ html()->textarea('content')->class('form-control h-100')->required() }}
      <label for="content">{{ __('comment.enter_your_message') }}</label>
    </div>
    <div class="mt-3">
      {{ html()->submit(__('comment.submit'))->class('btn btn-success btn-sm text-uppercase') }}
    </div>
    {{ html()->form()->close() }}
  </div>
</div>
<br />
