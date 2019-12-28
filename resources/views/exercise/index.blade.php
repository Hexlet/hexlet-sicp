@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="h2">{{ __('sicp.title') }}</h1>
            <h2 class="h5 text-muted mb-4">by {{ __('sicp.authors') }}</h2>
            @foreach ($exercises as $chapter => $exercise)
                <h3>Chapter {{ $chapter }}</h3>
                <p class="float-left">
                @foreach ($exercise as $value)
                    <span class="pr-3">{{ $value['path'] }}</span>
                @endforeach
                </p>
            @endforeach
        </div>
    </div>
</div>
@endsection
