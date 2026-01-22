@php
  use App\Helpers\TemplateHelper;
  use App\Helpers\LocalizationHelper;
  $currentLocale = LaravelLocalization::getCurrentLocale();
  $locales = LaravelLocalization::getSupportedLocales();
  $user = Auth::user();
@endphp

<header class="navbar navbar-expand-xl">
  <nav class="container py-2 border-bottom">
    <a href="{{ LaravelLocalization::getLocalizedURL($currentLocale, route('home')) }}" class="navbar-brand">
      <img src="{{ asset("images/logo-{$currentLocale}.svg") }}"
        alt="{{ __('layout.nav.logo_alt') }}" height="25px" class="align-baseline"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-responsive"
      aria-controls="navbar-responsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbar-responsive">
      <ul class="navbar-nav">
        <li class="nav-item"><a href="{{ route('chapters.index') }}"
            class="nav-link p-2">{{ __('layout.nav.chapters') }}</a></li>
        <li class="nav-item"><a href="{{ route('exercises.index') }}"
            class="nav-link p-2">{{ __('layout.nav.exercises') }}</a></li>
        <!-- TODO: translate guide to english -->
        @if (App::isLocale('ru'))
          <li class="nav-item"><a href="https://guides.hexlet.io/how-to-learn-sicp/"
              class="nav-link p-2">{{ __('layout.nav.sicp_read') }}</a></li>
        @else
          <li class="nav-item"><a href="{{ route('pages.show', ['page' => 'how-to-learn-sicp']) }}"
              class="nav-link p-2">{{ __('layout.nav.sicp_read') }}</a></li>
        @endif
        <li class="nav-item"><a href="{{ route('top.index') }}" class="nav-link p-2">{{ __('layout.nav.rating') }}</a>
        </li>
        <li class="nav-item"><a href="{{ TemplateHelper::getBookLink($currentLocale) }}"
            class="nav-link link-info p-2">{{ __('layout.nav.sicp_book') }}</a></li>
        @auth
          @if(auth()->user()->is_admin)
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle p-2" href="#" id="adminDropdown" role="button"
                 data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-shield-lock"></i> {{ __('admin.title') }}
              </a>
              <ul class="dropdown-menu x-z-index-dropdown dropdown-menu-right" aria-labelledby="adminDropdown">
                <li>
                  <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                    <i class="bi bi-people"></i> {{ __('admin.users.title') }}
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('admin.comments.index') }}">
                    <i class="bi bi-chat-dots"></i> {{ __('admin.comments.title') }}
                  </a>
                </li>
                <li>
                  <a class="dropdown-item" href="{{ route('admin.solutions.index') }}">
                    <i class="bi bi-code-square"></i> {{ __('admin.solutions.title') }}
                  </a>
                  <a class="dropdown-item" href="{{ route('admin.export.index') }}">
                    <i class="bi bi-download"></i> {{ __('admin.export.title') }}
                  </a>
                </li>
              </ul>
            </li>
          @endif
        @endauth
      </ul>
      <ul class="navbar-nav ms-md-auto">
        @guest
          @if (app()->environment('local'))
            <li>
              <a href="{{ route('auth.dev-login') }}" class="nav-link px-2" data-method="post"
                data-confirm="Are you sure you want to submit?"> Dev-login</a>
            </li>
          @endif
          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link p-2">{{ __('layout.nav.login') }}</a></li>
          <li class="nav-item"><a href="{{ route('register') }}"
              class="nav-link p-2">{{ __('layout.nav.register') }}</a>
          </li>
        @else
          <li class="nav-item dropdown d-md-block">
            <a class="nav-link dropdown-toggle py-1 px-2 link-secondary" id="dropdownMenuButton" data-bs-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" href="#">
              <i class="bi bi-person align-middle fs-4"></i>
            </a>
            <ul class="dropdown-menu x-z-index-dropdown dropdown-menu-right" aria-labelledby="dropdownMenuButton">
              <li>
                <a href="{{ route('users.show', $user) }}" class="dropdown-item link-secondary">{{ $user->name }}</a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('settings.account.index') }}">{{ __('account.settings') }}</a>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('my.show') }}">
                  {{ __('layout.nav.my_progress') }}
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}" data-method="post" rel="nofollow">
                  {{ __('layout.nav.logout') }}
                </a>
              </li>
            </ul>
          </li>
        @endguest
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle px-2 link-secondary" id="dropdownFlagButton" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" href="#">
            <img src="{{ LocalizationHelper::getPathToLocaleFlag($currentLocale) }}"
              alt="{{ LocalizationHelper::getNativeLanguageName($currentLocale) }}" class="me-1" width="24">
            <span class="d-md-none">{{ LocalizationHelper::getNativeLanguageName($currentLocale) }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-right x-min-w-0" aria-labelledby="dropdownFlagButton">
            @foreach (LocalizationHelper::getOtherLocales($currentLocale, $locales) as $localeCode => ['native' => $language])
              <li>
                <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" rel="alternate"
                  class="dropdown-item" hreflang="{{ $localeCode }}">
                  <img src="{{ LocalizationHelper::getPathToLocaleFlag($localeCode) }}"
                    alt="{{ LocalizationHelper::normalizeNativeLanguageName($language) }}" class="mr-1"
                    width="24">
                  <span class="d-md-none">{{ LocalizationHelper::normalizeNativeLanguageName($language) }}</span>
                </a>
              </li>
            @endforeach
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
