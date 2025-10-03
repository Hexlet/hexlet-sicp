<nav class="nav flex-column nav-pills">
    <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
       href="{{ route('admin.users.index', request()->only(['filter'])) }}">
        <i class="bi bi-people"></i> {{ __('admin.users.title') }}
    </a>
    <a class="nav-link {{ request()->routeIs('admin.comments.*') ? 'active' : '' }}"
       href="{{ route('admin.comments.index', request()->only(['filter'])) }}">
        <i class="bi bi-chat-dots"></i> {{ __('admin.comments.title') }}
    </a>
    <a class="nav-link {{ request()->routeIs('admin.solutions.*') ? 'active' : '' }}"
       href="{{ route('admin.solutions.index', request()->only(['filter'])) }}">
        <i class="bi bi-code-square"></i> {{ __('admin.solutions.title') }}
    </a>
</nav>
