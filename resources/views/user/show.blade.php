@extends('layouts.app')

@section('content')
    <div class="row my-4">
        <div class="col-12 col-md-3">
            <div class="position-sticky sticky-top pt-4 mb-4">
                <p class="h2 mb-2">
                    {{ $user->name }}
                </p>
            </div>
        </div>
        <div class="col-12 col-md-9 my-4">
            <h1 class="h3">{{ __('sicp.title') }}</h1>
            <h2 class="h4">by {{ __('sicp.authors') }}</h2>
            <div class="progress">
                <div class="progress-bar bg-success"
                    role="progressbar" style="width: {{ getReadChapterPercent($user->readChapters, $chapters) }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                </div>
            </div>
            <ul class="list-group">
                @foreach($chapters as $chapter)
                <li class="list-group-item {{ haveRead($user, $chapter) ? 'list-group-item-success' : '' }}">
                    @if(!$chapter->can_read)
                        <h3 class="h4"><a href="{{ route('chapters.show', $chapter) }}">{{ $chapter->path }} {{ getChapterName($chapter->path) }}</a></h3>
                    @else
                        <h4 class="h6"><a href="{{ route('chapters.show', $chapter) }}">{{ $chapter->path }} {{ getChapterName($chapter->path) }}</a></h4>
                    @endif
                </li>
                @endforeach
            <ul>
        </div>
    </div>
@endsection
