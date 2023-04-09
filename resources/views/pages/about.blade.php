@extends('layouts.app')
@section('description'){{ __('about.description') }}@endsection
@section('content')
<h1 class="my-4">{{ __('about.title') }}</h1>
<p>{{ __('about.welcome') }}</p>
<p>{{ __('about.description') }}</p>
<h4>{{ __('about.features') }}</h4>
<div>
    <ul>
        @foreach (__('about.features_list') as $key => $item)
        <li>{{ __(sprintf('welcome.features_list.%s', $key)) }}</li>
        @endforeach
    </ul>
</div>
<h4>{{ __('about.What does the rating depend on?') }}</h4>
<p>{{ __('about.About rating') }}</p>
<h4>{{ __('about.Guidelines') }}</h4>
<p><a href="https://guides.hexlet.io/how-to-learn-sicp">{{ __('about.How to learn the SICP?') }}</a></p>
<p><a href="https://github.com/hexlet-boilerplates/sicp-racket">{{ __('about.Repository with Racket settings for the SICP') }}</a></p>
<p><a href="https://www.youtube.com/watch?v=bFMbqKRjU84&list=PLo6puixMwuSO8eB2uBH5lZy5kjNtdhTfT">{{ __('about.Video course') }}</a></p>
<p><a href="https://www.youtube.com/playlist?list=PLc6AqfeLgwzPPK1H3XV1Wfb_CGvT6sXkC">{{ __('about.MIT course') }}</a></p>
<p><a href="https://github.com/Hexlet/hexlet-sicp">{{ __('about.Participate in the project') }}</a></p>
@endsection
