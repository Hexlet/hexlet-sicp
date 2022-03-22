<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', __('layout.meta.description'))">
    @hasSection ('meta-robots')
    <meta name="robots" content="@yield('meta-robots')">
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token" />

    <title>@yield('title', __('layout.title.name'))</title>

    @livewireStyles
    @includeWhen(app()->environment('production'), 'layouts.deps._gtm_head')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Styles -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous"
    >
    @stack('styles')
    <link href="{{ mix('css/_custom.css') }}" rel="stylesheet">
    {{--<link href="{{ mix('css/app.css') }}" rel="stylesheet">--}}
    @includeWhen(app()->environment('production'), 'layouts.deps._gtm_body')
    @includeWhen(app()->environment('production'), 'layouts.deps._metrika')
</head>
<body  class="min-vh-100 d-flex flex-column">
    @include('layouts.bootstrap5._nav')
    <div class='flex-grow-1'>
        <main class='my-4'>
            <div class="container mb-3">
                @include('layouts.bootstrap5._flash')
                {{-- @include('flash::message')--}}
                @yield('content')
            </div>
        </main>
    </div>
  
    @include('layouts.bootstrap5._footer')
    @livewireScripts
    {{--<script src="{{ mix('js/app.js') }}" defer></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/rails-ujs@5.2.6/lib/assets/compiled/rails-ujs.min.js"></script>
    <script src="{{ mix('js/hljs.js')}}"></script>
    <script src="{{ mix('js/font-awesome.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
