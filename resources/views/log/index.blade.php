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
                                    @if($logItem->getExtraProperty('chapters'))
                                    {{ __('activitylog.action_'.$logItem->description) }}
                                    <ul>
                                        @foreach(getChapterNameArray($logItem->getExtraProperty('chapters')) as $chapter)
                                        <li>{{  $chapter }}</li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </td>
                                <td>
                                @if($logItem->causer)
                                <a href="{{ route('users.show', $logItem->causer->id) }}">{{ $logItem->causer->name }}</a>
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
