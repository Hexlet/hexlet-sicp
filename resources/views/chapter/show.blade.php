@extends('layouts.app')
@php
/**
 * @var \App\Chapter $chapter
 * @var \App\Exercise $exercise
 * @var \App\User $authUser
 * @var bool $isCompletedChapter
 */
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <small>
                @if ($chapter->parent)
                <a href="{{ route('chapters.show', $chapter->parent) }}">
                    {{ $chapter->parent->path }}. {{ getChapterName($chapter->parent->path) }}
                </a>
                @endif
            </small>
            <h1 class="h2">{{ $chapter->path }}. {{ getChapterName($chapter->path) }}</h1>
            <ul>
                @foreach ($chapter->children as $child)
                <li>
                    <h2 class="h5">
                        <a href="{{ route('chapters.show', $child) }}">
                            {{ $child->path }}. {{ getChapterName($child->path) }}
                        </a>
                    </h2>
                </li>
                @endforeach
            </ul>

            @if ($chapter->exercises->isNotEmpty())
            <p>{{ __('chapter.show.exercises_list') }}:</p>
            <ul>
                @foreach ($chapter->exercises as $exercise)
                <li><a href="{{ route('exercises.show', $exercise) }}">{{ $exercise->path }}</a> </li>
                @endforeach
            </ul>
            @endif
            @if($chapter->can_read)
                @if ($chapter->users->isNotEmpty())
                <p>{{ __('chapter.show.who_completed') }}</p>
                <ul>
                    @foreach ($chapter->users as $user)
                    <li><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></li>
                    @endforeach
                </ul>
                @else
                <p>{{ __('chapter.show.nobody_completed') }}</p>
                @endif
                @auth
                {!! Form::open()->route('users.chapters.store', [$authUser])->post() !!}
                @foreach($authUser->chapters as $userChapter)
                {!! Form::hidden('chapters_id[]', $userChapter->id) !!}
                @endforeach
                {!! Form::hidden('chapters_id[]', $chapter->id) !!}
                {!! Form::submit(($isCompletedChapter ? '<i class="fas fa-check"></i> ' : '')
                    . __(sprintf('chapter.show.%s', $isCompletedChapter ? 'already_completed' : 'mark_read')))
                            ->success()
                            ->disabled($isCompletedChapter) !!}
                @if ($isCompletedChapter)
                    <a href="{{ route('users.chapters.destroy', [$authUser, $chapter]) }}"
                       class="text-decoration-none"
                       data-toggle="tooltip"
                       data-placement="bottom"
                       data-confirm="{{ __('account.are_you_sure') }}"
                       data-method="delete">
                        <span class="pl-2">{{ __('layout.common.cancel') }}</span>
                    </a>
                @endif
                {!! Form::close() !!}
                @endauth
            @endif
            @comments(['model' => $chapter])
        </div>
    </div>
</div>
@endsection
