@extends('layouts.app')

@section('title', __('admin.export.title'))

@section('content')
<div class="row my-4">
    <div class="col-md-3 col-lg-2">
        @include('admin.partials.navigation')
    </div>

    <div class="col-md-9 col-lg-10">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-4">
                    <i class="bi bi-download"></i> {{ __('admin.export.title') }}
                </h4>

                <form method="POST" action="{{ route('admin.export') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">
                            {{ __('admin.export.select') }}
                        </label>

                        <select name="type" class="form-select" required>
                            <option value="users">{{ __('admin.export.types.users') }}</option>
                            <option value="chapters">{{ __('admin.export.types.chapters') }}</option>
                            <option value="exercises">{{ __('admin.export.types.exercises') }}</option>
                            <option value="solutions">{{ __('admin.export.types.solutions') }}</option>
                            <option value="comments">{{ __('admin.export.types.comments') }}</option>
                            <option value="activity">{{ __('admin.export.types.activity') }}</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-file-earmark-arrow-up"></i>
                        {{ __('admin.export.button') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
