<div class="container graph mt-4">
  <div class="d-flex justify-content-center overflow-hidden m-4">
    <ul class="squares mb-0">
      @foreach ($chart as $square)
        <li data-level="{{ $square }}"></li>
      @endforeach
    </ul>
  </div>
</div>
