@extends('layouts.app')

@php
/**
 * @var \Illuminate\Support\Collection $chapters
 * @var \App\Chapter $chapter
 * @var \App\Exercise $exercise
 * @var \Illuminate\Support\Collection $completedExercises
 * @var \App\User $user
 */
@endphp
@section('content')
    <div class="row my-4">
        <div class="col-12 col-md-3">
            <div class="position-sticky sticky-top pt-4 mb-4 no-z-index" style="z-index: -1">
                <div class="card">
                    <div class="card-head"></div>
                    <img class="card-img-top" src="https://www.gravatar.com/avatar/{{ md5($user->email) }}?s=500" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-text">{{ $user->name }}</h3>
                    </div>
                    <ul class="list-group-flush list-group border-top">
                        <li class="list-group-item">{{ __('user.show.statistics.rating_position') }} {{ $userRatingPosition }}</li>
                        <li class="list-group-item">{{ __('user.show.statistics.points') }} {{ $points }}</li>
                        <li class="list-group-item">{{ __('user.show.statistics.read_chapters') }} {{ $user->readChapters->count() }} / {{ $chapters->count() }}</li>
                        <li class="list-group-item">{{ __('user.show.statistics.completed_exercises') }} {{ $user->completedExercises()->count() }} / {{ $exercises->count() }}</li>
                        <li class="list-group-item">{{ __('user.show.statistics.left_comments') }} {{ $user->comments->count() }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9 my-4">
            <h1 class="h3">{{ __('sicp.title') }}</h1>
            <h2 class="h4">by {{ __('sicp.authors') }}</h2>
            <ul class="list-group">
                @foreach($chapters as $chapter)
                <li class="list-group-item">
                    @if(!$chapter->can_read)
                        <h3 class="h4"><a href="{{ route('chapters.show', $chapter) }}">{{ $chapter->path }} {{ getChapterName($chapter->path) }}</a></h3>
                    @else
                        <h4 class="h6">
                            <a class="d-flex" href="{{ route('chapters.show', $chapter) }}">
                                {{ $chapter->path }} {{ getChapterName($chapter->path) }}
                                @if (haveRead($user, $chapter))
                                <div class="ml-auto"><i class="text-success fas fa-check"></i></div>
                                @endif
                            </a>
                        </h4>
                    @endif
                    @foreach($chapter->exercises as $exercise)
                        <a href="{{ route('exercises.show', $exercise) }}"
                           class="text-decoration-none"
                           data-toggle="tooltip"
                           data-placement="bottom"
                           title="{{ $exercise->path }}">
                            @if($completedExercises->has($exercise->id))
                            <i class="fa fa-check-square text-success"></i>
                            @else
                            <i class="far fa-square text-muted"></i>
                            @endif
                        </a>
                    @endforeach
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
