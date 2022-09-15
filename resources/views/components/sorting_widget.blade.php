<a class="text-decoration-none" href="{{ $route }}">
    {{ $name }}
    @switch($sortParams)
        @case("-{$nameParams}")
        <i class="fa fa-angle-up" aria-hidden="true"></i>
        @break
        @case($nameParams)
        <i class="fa fa-angle-down" aria-hidden="true"></i>
        @break
        @default
    @endswitch
</a>
