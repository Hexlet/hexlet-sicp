<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ __('layout.meta.description') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token"/>

    <title>{{ __('layout.nav.name') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    @includeWhen(app()->environment('production'), 'layouts.deps._gtm_head')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

    <body class="min-vh-100 d-flex flex-column pt-5">
        @includeWhen(app()->environment('production'), 'layouts.deps._gtm_body')
        <header class="fixed-top">
            @include('layouts._nav')
        </header>

        @include('flash::message')
        @yield('content')

        @include('layouts._footer')
        @includeWhen(app()->environment('production'), 'layouts.deps._metrika')
    </body>
</html>
