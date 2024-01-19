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
      <li>{{ __('activityChart.month.january') }}</li>
      <li>{{ __('activityChart.month.february') }}</li>
      <li>{{ __('activityChart.month.march') }}</li>
      <li>{{ __('activityChart.month.april') }}</li>
      <li>{{ __('activityChart.month.may') }}</li>
      <li>{{ __('activityChart.month.june') }}</li>
      <li>{{ __('activityChart.month.july') }}</li>
      <li>{{ __('activityChart.month.august') }}</li>
      <li>{{ __('activityChart.month.september') }}</li>
      <li>{{ __('activityChart.month.october') }}</li>
      <li>{{ __('activityChart.month.november') }}</li>
      <li>{{ __('activityChart.month.december') }}</li>
    </ul>
    <ul class="squares mb-0">
      @foreach ($chart as $square)
        <li data-level="{{ $square }}"></li>
      @endforeach
    </ul>
  </div>
</div>
