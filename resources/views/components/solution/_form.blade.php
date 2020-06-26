@php
/**
 * @var \App\Exercise $exercise
 * @var \App\Solution $solution
 * @var \App\User $authUser
 */
@endphp
<div>
    {!! Form::open()->route('users.solutions.store', [$authUser]) !!}
    {!! Form::textarea('content')->placeholder(__('solution.placeholder'))->attrs(['rows' => 10])->required() !!}
    {!! Form::hidden('exercise_id', $exercise->id) !!}
    <div class="form-group-row">
        <div class="d-flex flex-row-reverse">
            {!! Form::submit(__('solution.save'), 'primary') !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
