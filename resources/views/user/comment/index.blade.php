@extends('layouts..app')
@section('description'){{ __('rating.index.description') }}@endsection
@section('content')
    <div class="my-4">
        <section>
            <h1 class="h3">{{ __('comment.user.title') }}</h1>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>{{ __('comment.user.whom') }}</th>
                        <th>{{ __('comment.user.text') }}</th>
                        <th>{{ __('comment.user.date') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>
                                @if($comment->commentable instanceof \App\Models\Exercise)
                                <a
                                    title="{{ __('exercise.exercise') }} {{ $comment->commentable->path }}"
                                    href="{{ route('exercises.show', [$comment->commentable,'#exercise-discussion']) }}"
                                >
                                    {{ getFullExerciseTitle($comment->commentable) }}
                                </a>
                                @else
                                    <a
                                        title="{{ __('chapter.chapter') }} {{ $comment->commentable->path }}"
                                        href="{{ route('chapters.show', $comment->commentable) }}"
                                    >
                                        {{$comment->commentable->path}} {{ getChapterName($comment->commentable->path) }}
                                    </a>
                                @endif
                            </td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ $comment->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
