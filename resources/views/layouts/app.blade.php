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
    @includeWhen(app()->environment('production'), 'layouts.deps._gtm_head')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Styles -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    >
    @stack('styles')
    <link href="{{ mix('css/_custom.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @includeWhen(app()->environment('production'), 'layouts.deps._gtm_body')
    @includeWhen(app()->environment('production'), 'layouts.deps._metrika')
</head>
<body  class="min-vh-100 d-flex flex-column">
    <div class="modal fade" id="correctionModal" tabindex="-1" aria-labelledby="correctionModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="correctionModal">{{ __('layout.modal.title') }}</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <p class="text-danger d-none" id="correctionModalFeedback">{{ __('layout.modal.network_error') }}</p>
            <b>{{ __('layout.modal.body') }}</b>
            <p class="p-4 my-3 bg-light">
                <span id="typoTextBefore"></span>
                <mark id="typoText"></mark>
                <span id="typoTextAfter"></span>
            </p>
            <div class="my-3">
              <textarea class="form-control" id="correctionModalReporterComment" rows="3"></textarea>
              <input type="hidden" id="correctionModalReporterName" value="{{ data_get(auth()->user(), 'name', __('layout.modal.guest')) }}">
            </div>
            <b>{{ __('layout.modal.question') }}</b>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('layout.modal.button_cancel') }}</button>
            <button type="button" class="btn btn-primary" id="correctionModalSendButton">{{ __('layout.modal.button_send') }}</button>
          </div>
        </div>
      </div>
    </div>

    @include('layouts._nav')
    <main class='flex-grow-1 my-4'>
        <div class="container mb-3">
            @include('flash::message')
            @yield('content')
        </div>
    </main>
    <footer class='bg-light border-top py-4 mt-auto'>
        <div class='container-xl'>
            <div class="row justify-content-lg-around">
                <div class="col-sm-6 col-md-3 col-lg-auto">
                    <a class="text-dark px-0 py-0 text-decoration-none " href="https://ru.hexlet.io">
                        <p class="h3 mb-2">&copy; Hexlet</p></a>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" href="{{ route('pages.show', ['page' => 'about']) }}">{{ __('layout.footer.about') }}</a></li>
                        <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://github.com/Hexlet/hexlet-sicp">{{ __('layout.footer.source_code') }}</a></li>
                        <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://slack-ru.hexlet.io/">Slack #hexlet-volunteers</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-auto">
                    <p class="h5 mb-3">{{ __('layout.footer.help') }}</p>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://ru.hexlet.io/blog">{{ __('layout.footer.blog') }}</a></li>
                        <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://ru.hexlet.io/knowledge">{{ __('layout.footer.knowledge') }}</a></li>
                        <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://ru.hexlet.io/pages/recommended-books">{{ __('layout.footer.recommended_books') }}</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-auto">
                    <p class="h5 mb-3">{{ __('layout.footer.other_os_projects') }}</p>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://github.com/Hexlet/hexlet-cv">{{ __('layout.footer.os_projects.cv') }}</a></li>
                        <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://github.com/Hexlet/hexlet-editor">{{ __('layout.footer.os_projects.editor') }}</a></li>
                        <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://github.com/Hexlet/hexlet-friends">{{ __('layout.footer.os_projects.friends') }}</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-auto">
                    <p class="h5 mb-3">{{ __('layout.footer.additionally') }}</p>
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://ru.code-basics.com/">{{ __('layout.footer.os_projects.code_basics') }}</a></li>
                        <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://codebattle.hexlet.io/">{{ __('layout.footer.os_projects.codebattle') }}</a></li>
                        <li class="nav-item"><a class="nav-link px-0 py-1 text-primary" target="_blank" href="https://guides.hexlet.io/">{{ __('layout.footer.os_projects.guides') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/hljs.js')}}"></script>
    <script src="{{ mix('js/font-awesome.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
