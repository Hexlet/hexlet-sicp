@extends('layouts.app')

@section('content')
<h1 class="my-4">
    Hexlet SICP
</h1>
<p>{{ __('welcome.description') }}</p>
<div class="row">
    <div class="col-md-8">
        <a href="https://mitpress.mit.edu/sites/default/files/sicp/index.html">
            <img class="img-fluid" src="{{ asset('img/Patchouli_Gives_SICP.png') }}" alt="Начать изучать sicp">
        </a>
    </div>
    <div class="col-md-4">
        <h2 class="my-3">{{ __('welcome.what_is_here') }}</h2>
        <p class="text-justify">{{ __('welcome.about_sicp') }}
            <br>
            <a href="https://guides.hexlet.io/how-to-learn-sicp/">{{ __('layout.nav.sicp_read') }}</a>
        </p>
        <h2 class="my-3">{{ __('welcome.features') }}</h2>
        <ul>
            @foreach (__('welcome.features_list') as $key => $item)
            <li>{{ __(sprintf('welcome.features_list.%s', $key)) }}</li>
            @endforeach
        </ul>
        <h2 class="my-3">{{ __('welcome.coming_soon') }}</h2>
        <ul>
            @foreach (__('welcome.coming_soon_list') as $key => $item)
            <li>{{ __(sprintf('welcome.coming_soon_list.%s', $key)) }}</li>
            @endforeach

        </ul>
        <a class="btn btn-primary" href="{{ (route('my')) }}" role="button">{{ __('layout.welcome.mark_read') }}</a>
    </div>
</div>
<!-- /.row -->
@endsection
