<div class="graph">
    <ul class="squares">
    @foreach($chart as $square)
        <li data-level="{{ $square }}"></li>
    @endforeach
    </ul>
</div>
