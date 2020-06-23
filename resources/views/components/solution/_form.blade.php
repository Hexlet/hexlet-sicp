@php
/**
 * @var \App\Exercise $exercise
 * @var \App\Solution $solution
 * @var \App\User $authUser
 */
@endphp
<div class="jumbotron-fluid bg-light mt-0">
        {!! Form::open()->route('users.solutions.store', [$authUser]) !!}
        {!! Form::textarea('content')->placeholder(__('solution.placeholder'))->value($solution->content ?? null)->attrs(['rows' => 10])->required() !!}
        {!! Form::hidden('exercise_id', $exercise->id) !!}
        {!! Form::submit(__('solution.save'), 'primary btn-sm text-uppercase') !!}
        {!! Form::close() !!}
</div>