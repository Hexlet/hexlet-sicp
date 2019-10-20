@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="h3">{{ __('sicp.title') }}</h1>
            <h2 class="h4">by {{ __('sicp.authors') }}</h2>
            @include('chapter.list', ['chapters' => $chapters]);
        </div>
    </div>
</div>
@endsection
