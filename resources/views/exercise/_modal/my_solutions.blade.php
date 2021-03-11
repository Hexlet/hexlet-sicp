@php
/**
 * @var \App\Models\Exercise $exercise
 * @var \App\Models\Solution[]|Illuminate\Support\Collection $userSolutions
 * @var \App\Models\User $authUser
 */
@endphp

<div class="modal fade" id="showExercises" tabindex="-1" role="dialog" aria-labelledby="modal showExercises" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('solution.title_output_solution') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach ($userSolutions as $solution)
                <p class="bg-light py-2 pl-1"><a href="{{ route('users.solutions.show', [$authUser, $solution]) }}">{{ $solution->created_at }}</a></p>
                <pre class="ml-4 mb-2"><code>{{ $solution->content }}</code></pre>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">{{ __('layout.common.close') }}</button>
            </div>
        </div>
    </div>
</div>
