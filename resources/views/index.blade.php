@extends('layouts.app')

@section('content')
<ol>
    @foreach ($nodes as $node)
        <li value="{{ $node->order_number }}">{{ $node->description }}</li>
    @endforeach
</ol>
@endsection