<nav class="nav nav-pills nav-fill mb-4 border-bottom pb-2">
    <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
       href="{{ route('admin.users.index') }}">
        <i class="bi bi-people"></i> {{ __('admin.users.title') }}
    </a>
    <a class="nav-link {{ request()->routeIs('admin.comments.*') ? 'active' : '' }}"
       href="{{ route('admin.comments.index') }}">
        <i class="bi bi-chat-dots"></i> {{ __('admin.comments.title') }}
    </a>
    <a class="nav-link {{ request()->routeIs('admin.solutions.*') ? 'active' : '' }}"
       href="{{ route('admin.solutions.index') }}">
        <i class="bi bi-code-square"></i> {{ __('admin.solutions.title') }}
    </a>
</nav>
