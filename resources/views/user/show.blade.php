@extends('layouts.app')

@section('content')
    <div class="row my-4">
        <div class="col-12 col-md-3">
            <div class="position-sticky sticky-top pt-4 mb-4">
                <h1 class="h2 mb-2">
                    {{ $user->name }}
                </h1>
            </div>
        </div>
        <div class="col-12 col-md-9 my-4">
            <h3>{{ __('sicp.title') }}</h3>
            <span>{{ __('sicp.authors') }}</span>
            <div class="progress">
                    <div class="progress-bar bg-success"
                        role="progressbar" style="width: {{ getReadChapterPercent($user->readChapters, $chapters) }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                    </div>
            </div>
            <ul class="list-group">
                @foreach($chapters as $chapter)
                <li class="list-group-item {{ haveRead($user, $chapter) ? 'list-group-item-success' : '' }}">
                        {{ $chapter->path }} {{ getChapterName($chapter->path) }}
                    </li>
                @endforeach
        </div>
    </div>
@endsection
