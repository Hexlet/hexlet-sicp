@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="h2">{{ __('sicp.title') }}</h1>
        <h2 class="h5 text-muted mb-4">by {{ __('sicp.authors') }}</h2>
        @includeWhen(isset($chapters[null]), 'chapter.list', ['chapters' => $chapters, 'parent' => null])
    </div>
</div>
@endsection
