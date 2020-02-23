@extends('layouts.app')

@section('content')
<h1 class="my-4">{{ __('welcome.title') }}</h1>
<p>{{ __('welcome.description') }}</p>
<div class="row">
    <div class="col-md-8">
        <a href="https://mitpress.mit.edu/sites/default/files/sicp/index.html">
            <img class="img-fluid" src="{{ asset('img/Patchouli_Gives_SICP.png') }}" alt="Начать изучать sicp">
        </a>
        <h3 class="my-3"><a href="{{ (route('log.index')) }}">{{ __('activitylog.title') }}</a></h3>
        @foreach($logItems as $logItem)
        <div class="media text-muted pt-1">
            <div class="media-body pb-1 mb-0 small lh-125 border-bottom border-gray">
                <div class="d-flex justify-content-between align-items-center w-100">
                    <strong class="text-gray-dark">
                        @if($logItem->causer)
                        <a href="{{ route('users.show', $logItem->causer->id) }}">{{ $logItem->causer->name }}</a>
                        @endif
                    </strong>
                    <a href="{{ $logItem->getExtraProperty('url') ?? '#' }}">{{ $logItem->created_at }}</a>
                </div>
                @if($logItem->description === 'commented')
                <a href="{{ $logItem->getExtraProperty('url') }}">
                    {{ __('activitylog.action_'.$logItem->description) }}
                </a>
                <span>
                    {{ $logItem->getExtraProperty('comment.content') }}
                </span>
                @else
                <div class="d-block">
                    <a data-toggle="collapse"
                       href="#collapseExp{{ $logItem->id }}"
                       aria-expanded="false"
                       aria-controls="collapseExp{{ $logItem->id }}">
                        {{ __('activitylog.action_'.$logItem->description) }}
                        {{ $logItem->getExtraProperty('count') ?? count($logItem->getExtraProperty('chapters')) }}
                    </a>
                    <div class="collapse" id="collapseExp{{ $logItem->id }}">
                        @if($logItem->getExtraProperty('chapters'))
                        <ul>
                        @foreach(($logItem->getExtraProperty('chapters')) as $chapter)
                            <li>{{ $chapter }} {{ getChapterName($chapter) }}</li>
                        @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-md-4">
        <h2 class="my-3">{{ __('welcome.what_is_here') }}</h2>
        <p>{{ __('welcome.about_sicp') }}
            <br>
            <a href="https://guides.hexlet.io/how-to-learn-sicp/">{{ __('layout.nav.sicp_read') }}</a>
        </p>
        <h2 class="my-3">{{ __('welcome.features') }}</h2>
        <ul>
            @foreach (__('welcome.features_list') as $key => $item)
            <li>{{ __(sprintf('welcome.features_list.%s', $key)) }}</li>
            @endforeach
        </ul>
        <h2 class="my-3">{{ __('welcome.coming_soon') }}</h2>
        <ul>
            @foreach (__('welcome.coming_soon_list') as $key => $item)
            <li>{{ __(sprintf('welcome.coming_soon_list.%s', $key)) }}</li>
            @endforeach

        </ul>
        <a class="btn btn-primary" href="{{ (route('my')) }}" role="button">{{ __('layout.welcome.mark_read') }}</a>
    </div>
</div>
<!-- /.row -->
@endsection
