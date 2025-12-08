<div class="graph d-flex justify-content-center mx-auto mt-4">
  <ul class="days m-0">
    @foreach ($activityChart->getDays() as $day)
      <li>{{ __($day->getTranslationKey()) }}</li>
    @endforeach
  </ul>
  <div class="activityChart m-1">
    <ul class="months">
      @foreach ($activityChart->getMonths() as $chartMonth)
        <li data-weeks="{{ $chartMonth->getWeekCount() }}">{{ __($chartMonth->getMonth()->getTranslationKey()) }}</li>
      @endforeach
    </ul>
    <ul class="squares mb-0">
      @foreach ($activityChart->getSquares() as $square)
        @if ($square === null)
          <li class="empty"></li>
        @else
          <li data-level="{{ $square->getLevel()->value }}"
              title="{{ $square->getTitle() }}"
          ></li>
        @endif
      @endforeach
    </ul>
  </div>
</div>
