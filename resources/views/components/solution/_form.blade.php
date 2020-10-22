@php
/**
 * @var \App\Exercise $exercise
 * @var \App\Solution $solution
 * @var \App\User $authUser
 */
@endphp
<div>
    {{ BsForm::open(route('users.solutions.store', [$authUser])) }}
    {{ BsForm::textarea('content')->placeholder(__('solution.placeholder'))->required()->attribute('rows', 10) }}
    {{ Form::hidden('exercise_id', $exercise->id) }}
    <div class="d-flex justify-content-end">
        {{ BsForm::submit(__('solution.save'))->primary() }}
    </div>
    {{ BsForm::close() }}
</div>
