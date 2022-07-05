@extends('layouts..app')
@php
    /**
     * @var \App\Models\Chapter $chapter
     * @var \App\Models\Chapter $previousChapter
     * @var \App\Models\Chapter $nextChapter
     * @var \App\Models\Exercise $exercise
     * @var \App\Models\User $authUser
     * @var bool $isCompletedChapter
     */
@endphp
@section('title'){{ $chapter->path }}. {{ getTitleContent(getChapterName($chapter->path)) }}@endsection
@section('description')@foreach (Breadcrumbs::generate('chapter', $chapter) as $breadcrumb){{$breadcrumb->title}} / @endforeach @endsection
@section('content')
    {{ Breadcrumbs::render('chapter', $chapter) }}
    <div class="row justify-content-center">
        <div class="sticky-top col-md-12 d-flex justify-content-between">
            @if($previousChapter->exists)
                <a class="mr-auto"
                   href="{{ route('chapters.show', $previousChapter) }}">@lang('chapter.show.previous_chapter')</a>
            @endif
            @if($nextChapter->exists)
                <a class="ml-auto"
                   href="{{ route('chapters.show', $nextChapter) }}">@lang('chapter.show.next_chapter')</a>
            @endif
        </div>
        <div class="col-md-8">
            <small>
                @if ($chapter->parent)
                    <a href="{{ route('chapters.show', $chapter->parent) }}">
                        {{ $chapter->parent->path }}. {{ getChapterName($chapter->parent->path) }}
                    </a>
                @endif
            </small>
            <h1 class="h2">
                {{ $chapter->path }}. {{ getChapterName($chapter->path) }}
                <small>
                    <a class="text-muted"
                       target="_blank"
                       href="{{ getChapterOriginLink($chapter) }}"
                       data-bs-toggle="tooltip"
                       data-bs-placement="right"
                       title="{{ __('layout.common.origin') }}">
                        <i class="bi bi-box-arrow-up-right"></i>
                    </a>
                </small>
            </h1>
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
                        <li><a href="{{ route('exercises.show', $exercise) }}">{{ $exercise->path }}
                                . {{ getExerciseTitle($exercise) }}</a></li>
                    @endforeach
                </ul>
            @endif
            @if($chapter->can_read)
                @auth
                    {{ BsForm::open(route('users.chapters.store', [$authUser])) }}
                    @foreach($authUser->chapters as $userChapter)
                        {{ Form::hidden('chapters_id[]', $userChapter->id) }}
                    @endforeach
                    {{ Form::hidden('chapters_id[]', $chapter->id) }}
                    <div class="form-group">
                        {{ Form::button(($isCompletedChapter ? '<i class="bi bi-check"></i> ' : '')
                            . __(sprintf('chapter.show.%s', $isCompletedChapter ? 'already_completed' : 'mark_read')),
                             ['type' => 'submit', 'class' => 'btn btn-success', 'disabled' => $isCompletedChapter]) }}
                    </div>
                    @if ($isCompletedChapter)
                        <a href="{{ route('users.chapters.destroy', [$authUser, $chapter]) }}"
                           class="text-decoration-none"
                           data-bs-toggle="tooltip"
                           data-bs-placement="bottom"
                           data-confirm="{{ __('chapter.remove_completed_chapter', ['chapter_path' => $chapter->path]) }}"
                           data-method="delete">
                            <span class="pl-2">{{ __('layout.common.cancel') }}</span>
                        </a>
                    @endif
                    {{ BsForm::close() }}
                @endauth
                @if ($chapter->users->isNotEmpty())
                    <br/>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modalCart">{{ __('chapter.show.who_completed') }}</button>
                    <div class="modal fade" id="modalCart" tabindex="-1" role="dialog"
                         aria-labelledby="completed-by-modal-title" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="completed-by-modal-title">{{ __('chapter.show.completed_by') }}</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('layout.common.close') }}"></button>
                                </div>
                                <div class="modal-body">
                                    <ul>
                                        @foreach ($chapter->users as $user)
                                            <li><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary"
                                            data-bs-dismiss="modal">{{ __('layout.common.close') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="mt-3">{{ __('chapter.show.nobody_completed') }}</p>
                @endif
            @endif
            @comments(['model' => $chapter])
        </div>
    </div>
@endsection
