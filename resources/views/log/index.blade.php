@extends('layouts.app')

@section('content')
    <div class="row my-4">
        <div class="col-12 my-4">
            <h1 class="h3">{{ __('activitylog.title') }}</h1>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('activitylog.user') }}</th>
                            <th>{{ __('activitylog.description') }}</th>
                            <th>{{ __('activitylog.time') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logItems as $logItem)
                            <tr>
                                <td>
                                @if($logItem->causer)
                                    <a href="{{ route('users.show', $logItem->causer->id) }}">
                                        {{ $logItem->causer->name }}
                                    </a>
                                @endif
                                </td>
                                <td>
                                @switch($logItem->description)
                                    @case('added')
                                    @case('removed')
                                        {{ getLogItemDescription($logItem) }}
                                        <ul>
                                            @foreach($logItem->getExtraProperty('chapters') as $chapter)
                                            <li>
                                                <a href="{{ getChapterOriginLinkForNumber($chapter) }}">
                                                    {{ $chapter }} {{ getChapterName($chapter) }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @break
                                    @case('commented')
                                        {{ getLogItemDescription($logItem) }}
                                        <a href="{{ $logItem->getExtraProperty('url') }}">
                                            {{ $logItem->getExtraProperty('comment.content') }}
                                        </a>
                                        @break
                                    @case('completed_exercise')
                                        {{ getLogItemDescription($logItem) }}
                                        <a href="{{ route('exercises.show', $logItem->getExtraProperty('exercise_id')) }}">
                                            {{ getFullExerciseTitle($logItem->subject) }}
                                        </a>
                                        @break
                                    @case('destroy_exercise')
                                        {{ getLogItemDescription($logItem) }}
                                        <a href="{{ route('exercises.show', $logItem->getExtraProperty('exercise_id')) }}">
                                            {{ getFullExerciseTitle($logItem->subject) }}
                                        </a>
                                        @break
                                    @case('add_solution')
                                        {{ getLogItemDescription($logItem) }}
                                        <a href="{{ route('exercises.show', $logItem->getExtraProperty('exercise_id')) }}">
                                            {{ $logItem->getExtraProperty('exercise_path') }} {{ getExerciseTitle(getExercise($logItem->getExtraProperty('exercise_path'))) }}
                                        </a>
                                        @break
                                    @default
                                        <span>{{ __('activitylog.action_unknown') }}</span>
                                @endswitch
                                </td>
                                <td>{{ $logItem->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $logItems->links() }}
            </div>
        </div>
    </div>
@endsection
