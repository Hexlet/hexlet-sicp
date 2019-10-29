@extends('layouts.app')

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
            <p>
                    Эту главу завершили:
                    <ul>
                        @foreach ($chapter->users as $user)
                        <li>
                            <a href="{{ route('users.show', $user) }}">
                                {{ $user->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </p>
        </div>
        <div>

        </div>
    </div>
</div>
@endsection
