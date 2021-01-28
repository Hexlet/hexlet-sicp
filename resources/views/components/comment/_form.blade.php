@php
/**
 * @var \Illuminate\Database\Eloquent\Model $model
 */
@endphp
<div class="card">
    <div class="card-body">
        {{ BsForm::open(route('comments.store')) }}
        {{ Form::hidden('commentable_type', get_class($model)) }}
        {{ Form::hidden('commentable_id', $model->id) }}
        {{ BsForm::textarea('content')->label(__('comment.enter_your_message'))->required()->attribute(['rows' => 5, "class" => "form-control mb-3"]) }}
        {{ BsForm::submit(__('comment.submit'))->attribute('class', 'btn btn-success btn-sm text-uppercase') }}
        {{ BsForm::close() }}
    </div>
</div>
<br />
