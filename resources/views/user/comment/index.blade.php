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
                        <th>{{ __('comment.user.id') }}</th>
                        <th>{{ __('comment.user.text') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->getKey() }}</td>
                            <td>{{ $comment->content }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
