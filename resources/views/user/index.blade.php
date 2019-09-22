@extends('layouts.app')

@section('content')
    <div class="row my-4">
        <div class="col-12 col-md-3">
            <div class="position-sticky sticky-top pt-4 mb-4">
                <h1 class="h2 mb-2">
                    {{ $user->name }}
                </h1>
            </div>
        </div>
        <div class="col-12 col-md-9 my-4">
            <h3>{{ __('sicp.title') }}</h3>
            <span>{{ __('sicp.authors') }}</span>

            <ul class="list-group">
                {!! Form::open()->route('users.chapters.store', [$user->id]) !!}
                @foreach($chapters as $chapter)
                    @php
                        $is_read = isset($readChaptersById[$chapter->id]);
                    @endphp

                    <li class="list-group-item">
                        <div class="form-check">
                            <input type="checkbox" name="chapters_id[]" class="form-check-input"  id="{{ $chapter->id }}" value="{{ $chapter->id }}" {{ $is_read ? 'checked' : '' }}>
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
