<div class="graph mt-5">
    <div class="d-flex align-items-end flex-column overflow-hidden m-4">
        <ul class="squares mb-0">
            @foreach($chart as $square)
                <li data-level="{{ $square }}"></li>
            @endforeach
        </ul>
    </div>
</div>
