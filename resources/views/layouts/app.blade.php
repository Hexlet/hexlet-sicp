<!DOCTYPE html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">

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

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

  <!-- Styles -->
  @stack('styles')
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  @includeWhen(app()->environment('production'), 'layouts.deps._gtm_body')
  @includeWhen(app()->environment('production'), 'layouts.deps._metrika')
</head>

<body class="min-vh-100 d-flex flex-column">
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
  <main class='flex-grow-1 m-0'>
    <div class="container p-0">
      @include('flash::message')
      @yield('content')
    </div>
    @yield('content_landing')
    @include('layouts._footer')
  </main>
  <script src="{{ mix('js/app.js') }}" defer></script>
  <script src="{{ mix('js/hljs.js')}}"></script>
  <script src="{{ mix('js/custom.js')}}" defer></script>
  @stack('scripts')
</body>

</html>
