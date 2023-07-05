@extends('layouts.app')

@php
    use App\Helpers\MarkdownHelper;
@endphp

@section('content')
    <div class="row my-4">
        <div class="col-12 my-4">
            <h1 class="h3">{{ __('comment.latest_comments') }}</h1>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('comment.author') }}</th>
                            <th>{{ __('comment.comment') }}</th>
                            <th>{{ __('comment.link') }}</th>
                            <th>{{ __('comment.time') }}</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td>
                                @if($comment->user)
                                    <a href="{{ route('users.show', $comment->user->id) }}">
                                        {{ $comment->user->name }}
                                    </a>
                                @endif
                                </td>

                                <td>{!! strip_tags(MarkdownHelper::text($comment->content)) !!}</td>

                                <td>
                                    <a href="{{ $comment->present()->getLink() }}">
                                        {{ $comment->getCommentableName() }}
                                    </a>
                                </td>

                                <td>{{ $comment->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
