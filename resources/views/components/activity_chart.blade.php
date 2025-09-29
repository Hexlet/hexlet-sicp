<div class="graph d-flex justify-content-center mx-auto mt-4">
  <ul class="days m-0">
    @foreach ($activityChart->getDays() as $day)
      <li>{{ __($day->getTranslationKey()) }}</li>
    @endforeach
  </ul>
  <div class="activityChart m-1">
    <ul class="months">
      @foreach ($activityChart->getMonths() as $month)
        <li>{{ __($month->getTranslationKey()) }}</li>
      @endforeach
    </ul>
    <ul class="squares mb-0">
      @foreach ($activityChart->getSquares() as $square)
        <li data-level="{{ $square->getLevel()->value }}"
            title="{{ $square->getTitle() }}"
        ></li>
      @endforeach
    </ul>
  </div>
</div>
