@extends('layouts.app')

@php
/**
 * @var \Illuminate\Support\Collection $chapters
 * @var \App\Chapter $chapter
 * @var \App\Exercise $exercise
 * @var \Illuminate\Support\Collection $completedExercises
 */
@endphp
@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ __('passwords.reset') }}
        </div>
    @endif
                    
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
                <li class="list-group-item">
                    @if(!$chapter->can_read)
                        <h3 class="h4"><a href="{{ route('chapters.show', $chapter) }}">{{ $chapter->path }} {{ getChapterName($chapter->path) }}</a></h3>
                    @else
                        <h4 class="h6">
                            <a class="d-flex" href="{{ route('chapters.show', $chapter) }}">
                                {{ $chapter->path }} {{ getChapterName($chapter->path) }}
                                @if (haveRead($user, $chapter))
                                <div class="ml-auto"><i class="text-primary fas fa-check"></i></div>
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
