<div class="graph d-flex justify-content-center mx-auto mt-4">
  <ul class="days m-0">
    <li>{{ __('activityChart.days.monday') }}</li>
    <li>{{ __('activityChart.days.tuesday') }}</li>
    <li>{{ __('activityChart.days.wednesday') }}</li>
    <li>{{ __('activityChart.days.thursday') }}</li>
    <li>{{ __('activityChart.days.friday') }}</li>
    <li>{{ __('activityChart.days.saturday') }}</li>
    <li>{{ __('activityChart.days.sunday') }}</li>
  </ul>
  <div class="activityChart m-1">
    <ul class="months">
      @php
        $currentMonth = now()->month;
        $monthKeys = ['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];
        $orderedMonths = collect($monthKeys)
            ->splice($currentMonth)
            ->merge(collect($monthKeys)->take($currentMonth))
            ->toArray();
      @endphp
      @foreach ($orderedMonths as $monthKey)
        <li>{{ __("activityChart.month.$monthKey") }}</li>
      @endforeach
    </ul>
    <ul class="squares mb-0">
      @foreach ($chart as $square)
        <li data-level="{{ $square['level'] }}"
            title="{{ $square['date'] }}: {{ $square['count'] }} "
        ></li>
      @endforeach
    </ul>
  </div>
</div>
