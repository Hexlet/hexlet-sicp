@php
    $currentLocale = LaravelLocalization::getCurrentLocale();
    $locales = LaravelLocalization::getSupportedLocales();
    $otherLocales = getOtherLocales($currentLocale, $locales);
    $user = Auth::user();
@endphp
<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom">
        <a class="navbar-brand" href="{{ LaravelLocalization::getLocalizedURL($currentLocale, '/') }}">
            {{ __('layout.nav.name') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="{{ route('chapters.index') }}">
                        {{ __('layout.nav.chapters') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" href="{{ route('exercises.index') }}">
                        {{ __('layout.nav.exercises') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-secondary" target="_blank" href="https://guides.hexlet.io/how-to-learn-sicp/">
                        {{ __('layout.nav.sicp_read') }}
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link text-secondary" href="{{ route('top.index') }}">
                        {{ __('layout.nav.rating') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-info" target="_blank" href="https://mitpress.mit.edu/sites/default/files/sicp/full-text/book/book.html">
                        {{ __('layout.nav.sicp_book') }}
                    </a>
                </li>
            </ul>

            <hr class="d-md-none">

            <!-- Right Side Of Navbar -->

            <!-- Authentication Links -->
            <ul class="navbar-nav ml-auto">
                @guest
                @if(app()->environment('local'))
                <li>
                    <a href="{{ route('auth.dev-login') }}"
                       class="nav-link"
                       data-method="post">
                        Dev-login
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        {{ __('layout.nav.login') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        {{ __('layout.nav.register') }}
                    </a>
                </li>
                @else
                <li class="nav-item dropdown d-none d-md-block">
                    <a class="nav-link dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu x-z-index-dropdown dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item text-secondary" href="{{ route('users.show', $user) }}">
                            {{ $user->name }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('settings.account.index') }}">
                            {{ __('account.settings') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('my') }}">
                            {{ __('layout.nav.my_progress') }}
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" data-method="post" rel="nofollow">
                            {{ __('layout.nav.logout') }}
                        </a>
                    </div>
                </li>

                <div class="d-md-none">
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{ route('settings.account.index') }}">
                            {{ __('account.settings') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{ route('my') }}">
                            {{ __('layout.nav.my_progress') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{ route('logout') }}" data-method="post" rel="nofollow">
                            {{ __('layout.nav.logout') }}
                        </a>
                    </li>
                </div>
                @endguest
            </ul>

            <!-- Language Links -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <hr class="d-md-none">
                    <a class="nav-link dropdown-toggle" id="dropdownFlagButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                        <img src="{{ getPathToLocaleFlag($currentLocale) }}" alt="{{ getNativeLanguageName($currentLocale) }}" class="mr-1" width="24">
                        <span class="d-md-none">{{ getNativeLanguageName($currentLocale) }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right x-min-w-0" aria-labelledby="dropdownFlagButton">
                        @foreach($otherLocales as $localeCode => ['native' => $language])
                            <a rel="alternate" class="dropdown-item pl-2 py-0" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <img src="{{ getPathToLocaleFlag($localeCode) }}" alt="{{ normalizeNativeLanguageName($language) }}" class="mr-1" width="24">
                                <span class="d-md-none">{{ normalizeNativeLanguageName($language) }}</span>
                            </a>
                         @endforeach
                    </div>
                </li>
            </ul>
        </div>
</nav>
