@extends('layout.app')

@section('content')
    <div class="row my-4">
        <div class="col-12 col-md-3">
            <div class="position-sticky sticky-top pt-4 mb-4">
                <h1 class="h2 mb-2">
                    {{ $user->name }}
                </h1>
            </div>
        </div>
        <div class="col-12 col-md-9 my-4 d-flex flex-column">
            <ul class="list-group">
                @foreach($chaptersTree as $chapter)

                    <li class="list-group-item">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"  id="{{ $chapter['id'] }}" value="{{ $chapter['id'] }}" {{ $chapter['is_read'] ? 'checked' : '' }}>

                            <label for="{{ $chapter['id'] }}" class="form-check-label">
                                {{ $chapter['path'] }}
                            </label>
                        </div>
                    </li>

                @endforeach
            </ul>
        </div>
    </div>
@endsection
