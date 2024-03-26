@extends('layouts.app')
@php
  /**
   * @var \App\Models\Chapter $chapter
   * @var \App\Models\Chapter $previousChapter
   * @var \App\Models\Chapter $nextChapter
   * @var \App\Models\Exercise $exercise
   * @var \App\Models\User $authUser
   * @var \App\Models\ChapterMember $currentChapterMember
   */
@endphp
@section('title')
  {{ getTitleContent(App\Helpers\ChapterHelper::fullChapterName($chapter->path)) }}
@endsection
@section('description')
  @foreach (Breadcrumbs::generate('chapter', $chapter) as $breadcrumb)
    {{ $breadcrumb->title }} /
  @endforeach
@endsection
@section('content')
  {{ Breadcrumbs::render('chapter', $chapter) }}
  <div class="row justify-content-center">
    <div
      class="sticky-top col-md-12 d-flex {{ $previousChapter->exists ? 'justify-content-between' : 'justify-content-end' }}">
      @if ($previousChapter->exists)
        <a class="mr-auto" href="{{ route('chapters.show', $previousChapter) }}">@lang('chapter.show.previous_chapter')</a>
      @endif
      @if ($nextChapter->exists)
        <a class="ml-auto" href="{{ route('chapters.show', $nextChapter) }}">@lang('chapter.show.next_chapter')</a>
      @endif
    </div>
    <div class="col-md-8">
      <small>
        @if ($chapter->parent)
          <a href="{{ route('chapters.show', $chapter->parent) }}">
            {{ App\Helpers\ChapterHelper::fullChapterName($chapter->parent->path) }}
          </a>
        @endif
      </small>
      <h1 class="h2">
        {{ App\Helpers\ChapterHelper::fullChapterName($chapter->path) }}
        <small>
          <a class="text-muted" target="_blank" href="{{ getChapterOriginLink($chapter) }}" data-bs-toggle="tooltip"
            data-bs-placement="right" title="{{ __('layout.common.origin') }}">
            <i class="bi bi-box-arrow-up-right"></i>
          </a>
        </small>
      </h1>
      <ul>
        @foreach ($chapter->children as $child)
          <li>
            <h2 class="h5">
              <a href="{{ route('chapters.show', $child) }}">
                {{ App\Helpers\ChapterHelper::fullChapterName($child->path) }}
              </a>
            </h2>
          </li>
        @endforeach
      </ul>
      @if ($chapter->can_read)
        @auth
          @if ($currentChapterMember->isFinished())
          <span class="text-decoration-none text-muted">@lang('chapter.members.finished')</span><i class="bi bi-check-lg text-success"></i>
          @elseif ($currentChapterMember->mayFinish())
          <a href="{{ route('chapters.members.finish', $chapter) }}" class="text-decoration-none"
            {{-- TODO: fix confirm messages --}}
            data-confirm="{{ __('chapter.members.confirm_finish', ['chapter_path' => $chapter->path]) }}"
            data-method="put">
            {{ __('chapter.members.finish') }}
          </a>
          @endif
        @endauth
      @endif
      @if ($chapter->exercises->isNotEmpty())
        <p>{{ __('chapter.show.exercises_list') }}:</p>
        <ul>
          @foreach ($chapter->exercises as $exercise)
            <li><a href="{{ route('exercises.show', $exercise) }}">{{ $exercise->path }}
                . {{ $exercise->getTitle() }}</a></li>
          @endforeach
        </ul>
      @endif
      @comments(['model' => $chapter])
    </div>
  </div>
@endsection
