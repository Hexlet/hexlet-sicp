<div class="card">
    <div class="card-body">
        {!! Form::open()->route('comments.store') !!}
        {!! Form::hidden('commentable_type', get_class($model)) !!}
        {!! Form::hidden('commentable_id', $model->id) !!}
        {!! Form::textarea('content', __('comment.enter_your_message'))->attrs(['rows' => 5])->required() !!}
        {!! Form::submit(__('comment.submit'), 'success btn-sm text-uppercase') !!}
        {!! Form::close() !!}
    </div>
</div>
<br />
