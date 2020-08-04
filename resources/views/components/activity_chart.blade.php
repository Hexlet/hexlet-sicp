<div class="graph mt-4">
    <div class="d-flex justify-content-end overflow-hidden m-4">
        <ul class="squares mb-0">
            @foreach($chart as $square)
                <li data-level="{{ $square }}"></li>
            @endforeach
        </ul>
    </div>
</div>
