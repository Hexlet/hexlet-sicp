<a class="text-decoration-none" href="{{ $route }}">
    {{ $name }}
    @switch($sortParams)
        @case("-{$nameParams}")
        <i class="bi bi-chevron-up" aria-hidden="true"></i>
        @break
        @case($nameParams)
        <i class="bi bi-chevron-down" aria-hidden="true"></i>
        @break
        @default
    @endswitch
</a>
