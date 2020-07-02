<div class="tab-content">
    <div class="table-responsive border border-top-0 p-4">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top h5">Exercises</th>
                    <th class="border-top h5">Solutions</th>
                </tr>
                @foreach ($lastSolutions as $solution)
                <tr>
                    <td>
                        <a href="{{ route('exercises.show', $solution['exercise']) }}">
                        Exercise {{ $solution->exercise->path }} {{ getExerciseTitle($solution->exercise) }} (Chapter {{ $solution->exercise->chapter->path }})
                    </td>
                    <td>
                        <a href="{{ route('users.solutions.show', [$user, $solution]) }}">
                        See details
                    </td>
                </tr>
                @endforeach
            </thead>
        </table>
    </div>
    {{ $lastSolutions->withQueryString()->links() }}
</div>
