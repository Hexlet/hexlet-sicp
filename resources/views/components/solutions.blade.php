@php
/**
 * @var \App\Models\Exercise $exercise
 * @var \App\Models\Solution[]|Collection $userSolutions
 * @var \App\Models\User $authUser
 */
@endphp

<div class="modal fade" id="interExercise" tabindex="-1" role="dialog" aria-labelledby="modal interExercise" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('solution.title_add_solution') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                @include('components.solution._form')
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="showExercises" tabindex="-1" role="dialog" aria-labelledby="modal showExercises" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('solution.title_output_solution') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                @foreach ($userSolutions as $solution)
                <p class="bg-light py-2 ps-1"><a href="{{ route('users.solutions.show', [$authUser, $solution]) }}">{{ $solution->created_at }}</a></p>
                <pre class="ms-4 mb-2"><code>{{ $solution->content }}</code></pre>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-db-dismiss="modal">{{ __('layout.common.close') }}</button>
            </div>
        </div>
    </div>
</div>
