<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hexlet SICP') }}</title>

    @vite(['resources/js/app.jsx', 'resources/sass/app.scss'])
    @inertiaHead
</head>
<body>
    @inertia
</body>
</html>
