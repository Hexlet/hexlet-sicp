<div class="tab-content">
    <div class="table-responsive border border-top-0 p-4">
        <table class="table">
            <thead>
                <tr>
                    <th class="border-top h5">Chapter</th>
                    <th class="border-top h5">Exercise</th>
                    <th class="border-top h5">Versions</th>
                </tr>
                @foreach ($completedExercisesList as $completedExercise)
                <tr>
                    <td>{{ $completedExercise['exercise']->chapter->path }} {{ getChapterName($completedExercise['exercise']->chapter->path) }}</td>
                    <td><a href="{{ route('exercises.show', $completedExercise['exercise']) }}">Exersise {{ $completedExercise['exercise']->path }}</td>
                    <td>{{ $completedExercise['count'] }}</td>
                </tr>
                @endforeach
            </thead>
        </table>
    </div>
</div>
