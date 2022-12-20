@extends('layouts.app')
@php
use App\Helpers\MarkdownHelper;
@endphp
@section('description'){{ __('rating.index.description') }}@endsection
@section('content')
    <div class="my-4">
        <section>
            <h1 class="h3">{{ __('comment.user.title') }}</h1>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="w-15">{{ __('comment.user.location') }}</th>
                        <th class="w-70">{{ __('comment.user.text') }}</th>
                        <th class="w-15">{{ __('comment.user.date') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>
                                @if($comment->commentable instanceof \App\Models\Exercise)
                                <a
                                    title="{{ __('exercise.exercise') }} {{ $comment->commentable->path }}"
                                    href="{{ route('exercises.show', [$comment->commentable]) . '#exercise-discussion' }}"
                                >
                                    {{ $comment->commentable->getFullTitle() }}
                                </a>
                                @else
                                    <a
                                        title="{{ __('chapter.chapter') }} {{ $comment->commentable->path }}"
                                        href="{{ route('chapters.show', $comment->commentable) }}"
                                    >
                                        {{ App\Helpers\ChapterHelper::fullChapterName($comment->commentable->path) }}
                                    </a>
                                @endif
                            </td>
                            <td>{!! strip_tags(MarkdownHelper::text($comment->content, 80)) !!}</td>
                            <td>{{ $comment->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
