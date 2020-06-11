@extends('layouts.app')

@section('content')
    <div class="row my-4">
        <div class="col-12 my-4">
            <h3>{{ __('activitylog.title') }}</h3>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('activitylog.time') }}</th>
                            <th>{{ __('activitylog.description') }}</th>
                            <th>{{ __('activitylog.user') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logItems as $logItem)
                            <tr>
                                <td>{{ $logItem->created_at }}</td>
                                <td>
                                @switch($logItem->description)
                                    @case('added')
                                        {{ getLogItemDescription($logItem) }}
                                        <ul>
                                            @foreach($logItem->getExtraProperty('chapters') as $chapter)
                                            <li>{{ $chapter }} {{ getChapterName($chapter) }}</li>
                                            @endforeach
                                        </ul>
                                        @break
                                    @case('removed')
                                        {{ getLogItemDescription($logItem) }}
                                        <ul>
                                            @foreach($logItem->getExtraProperty('chapters') as $chapter)
                                            <li>{{ $chapter }} {{ getChapterName($chapter) }}</li>
                                            @endforeach
                                        </ul>
                                        @break
                                    @case('commented')
                                        <a href="{{ $logItem->getExtraProperty('url') }}">
                                            {{ getLogItemDescription($logItem) }}:
                                            {{ $logItem->getExtraProperty('comment.content') }}
                                        </a>
                                        @break
                                    @case('completed_exercise')
                                        <a href="{{ route('exercises.show', $logItem->getExtraProperty('exercise_id')) }}">
                                            {{ getLogItemDescription($logItem) }}:
                                            {{ getExerciseTitle(getExerciseById($logItem->subject_id)) ?? $logItem->subject_id }}
                                        </a>
                                        @break
                                    @case('destroy_exercise')
                                        <a href="{{ route('exercises.show', $logItem->getExtraProperty('exercise_id')) }}">
                                            {{ getLogItemDescription($logItem) }}:
                                            {{ getExerciseTitle(getExerciseById($logItem->subject_id)) ?? $logItem->subject_id }}
                                        </a>
                                        @break
                                    @default
                                        <span>{{ __('activitylog.action_unknown') }}</span>
                                @endswitch
                                </td>
                                <td>
                                @if($logItem->causer)
                                    <a href="{{ route('users.show', $logItem->causer->id) }}">
                                        {{ $logItem->causer->name }}
                                    </a>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $logItems->links() }}
            </div>
        </div>
    </div>
@endsection
