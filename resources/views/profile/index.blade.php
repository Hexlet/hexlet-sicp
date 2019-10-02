@extends('layouts.app')

@section('content')
    <div class="row my-4">
        <div class="col-12 col-md-3">
            <div class="position-sticky sticky-top pt-4 mb-4">
                <p class="h2 mb-2">{{ $user->name }}</p>
            </div>
        </div>
        <div class="col-12 col-md-9 my-4">
            <h1 class="h3">{{ __('sicp.title') }}</h1>
            <h2 class="h4">by {{ __('sicp.authors') }}</h4>
            <ul class="list-group">
                {!! Form::open()->route('users.chapters.store', [$user]) !!}
                @foreach($chapters as $chapter)
                    @php
                        $is_read = $chapters->contains($chapter);
                    @endphp
                    <li class="list-group-item {{ getChapterHeaderTag($chapter) }}">
                        <div class="form-check">
                            @if($chapter->can_read)
                                <input type="checkbox" name="chapters_id[]" class="form-check-input"  id="{{ $chapter->id }}" value="{{ $chapter->id }}" {{ haveRead($user, $chapter) ? 'checked' : '' }}>
                            @endif
                            <label for="{{ $chapter->id }}" class="form-check-label">
                                {{ $chapter->path }} {{ getChapterName($chapter->path) }}
                            </label>
                        </div>
                    </li>
                @endforeach
                <div class="form-group my-2">
                    {!! Form::submit(__('Save')) !!}
                </div>
                {!! Form::close() !!}
            </ul>
        </div>
    </div>
@endsection
