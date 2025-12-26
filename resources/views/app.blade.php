<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hexlet SICP') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    @vite(['resources/js/app.jsx', 'resources/sass/app.scss'])
    @vite('resources/js/bootstrap.js')
    @inertiaHead
</head>
<body class="min-vh-100 d-flex flex-column">
    @includeWhen(app()->environment('production'), 'layouts.deps._gtm_head')
    @includeWhen(app()->environment('production'), 'layouts.deps._gtm_body')
    @includeWhen(app()->environment('production'), 'layouts.deps._metrika')
    @include('layouts._nav')
    <main class='flex-grow-1'>
        @inertia
    </main>
    @include('layouts._footer')
</body>
</html>
