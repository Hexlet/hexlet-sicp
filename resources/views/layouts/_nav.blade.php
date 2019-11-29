<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Hexlet SICP') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('chapters.index') }}">
                        <i class="fas fa-book"></i>

                        {{ __('layout.nav.chapters') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="https://guides.hexlet.io/how-to-learn-sicp/">
                        <i class="far fa-hand-point-right"></i>
                        {{ __('layout.nav.sicp_read') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ratings.index') }}">
                        <i class="fas fa-list-ol"></i>
                        {{ __('layout.nav.rating') }}
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt"></i>
                            {{ __('layout.nav.login') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        <i class="fas fa-user-plus"></i>
                        {{ __('layout.nav.register') }}
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('my') }}">
                        <i class="fas fa-tasks"></i>
                        {{ __('layout.nav.my_progress') }}
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false"><i class="far fa-user"></i></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('account.index') }}">{{ __('account.settings') }}</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" data-method="post" rel="nofollow">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('layout.nav.logout') }}
                    </a>
                </li>
                @endguest
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a rel="alternate" class="nav-link"
                    @if (LaravelLocalization::getCurrentLocale() == 'ru')
                        href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                            <img src="{{ asset('icons/flags/en.svg') }}" width="24px">
                    @else
                        href="{{ LaravelLocalization::getLocalizedURL('ru') }}">
                            <img src="{{ asset('icons/flags/ru.svg') }}" width="24px">
                    @endif
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
