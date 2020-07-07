
    <div class="table-responsive border border-top-0 p-2 p-lg-4">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top h5">{{ __('progresses.exercises') }}</th>
                    <th class="border-top h5">{{ __('progresses.solutions') }}</th>
                </tr>
                @foreach ($savedSolutionsExercises as $solution)
                <tr>
                    <td>
                        {{ __('progresses.exercise') }} {{ $solution->exercise->path }} {{ getExerciseTitle($solution->exercise) }} (Chapter {{ $solution->exercise->chapter->path }})
                    </td>
                    <td>
                        <a href="{{ route('users.solutions.show', [$user, $solution]) }}">
                        {{ __('progresses.see_details') }}
                    </td>
                </tr>
                @endforeach
            </thead>
        </table>
    </div>
    {{ $savedSolutionsExercises->fragment('nav-solutions')->links() }}
