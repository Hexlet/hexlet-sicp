@php
/**
 * @var \App\Models\Exercise $exercise
 * @var \App\Models\Solution $solution
 * @var \App\Models\User $authUser
 */
@endphp
<div>
    {{ BsForm::open(route('users.solutions.store', [$authUser])) }}
    {{ BsForm::textarea('content')->placeholder(__('solution.placeholder'))->required()->attribute(['rows' => 10, "class" => "form-control mb-3"]) }}
    {{ Form::hidden('exercise_id', $exercise->id) }}
    <div class="d-flex justify-content-end">
        {{ BsForm::submit(__('solution.save'))->primary() }}
    </div>
    {{ BsForm::close() }}
</div>
