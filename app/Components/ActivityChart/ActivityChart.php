<?php

namespace App\Components\ActivityChart;

use App\Components\ActivityChart\Enums\DayOfWeek;
use App\Components\ActivityChart\Enums\Month;
use App\Models\Activity;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Collection;

class ActivityChart
{
    private Collection $squares;
    private Collection $months;
    private array $days;

    private function __construct(int $userId)
    {
        $this->squares = $this->buildSquares($userId);
        $this->months = $this->buildMonths();
        $this->days = $this->buildDays();
    }

    public static function for(int $userId): self
    {
        return new self($userId);
    }

    private function buildSquares(?int $userId): Collection
    {
        $activitiesByDay = $this->getActivitiesByDay($userId);
        $startDate = now()->subYear();
        $endDate = now();

        $squares = collect(CarbonPeriod::create($startDate, '1 day', $endDate))
            ->map(function (Carbon $date) use ($activitiesByDay): Square {
                $day = $date->format('Y-m-d');
                $count = $activitiesByDay->get($day, 0);

                return new Square($date, $count);
            });

        $dayOfWeek = $startDate->dayOfWeekIso;
        $emptySquaresCount = $dayOfWeek - 1;

        $emptySquares = collect(array_fill(0, $emptySquaresCount, null));

        return $emptySquares->merge($squares);
    }

    private function getActivitiesByDay(?int $userId): Collection
    {
        return Activity::where('causer_id', $userId)
            ->orWhere(function ($query) use ($userId) {
                if (!$userId) {
                    $query->whereNotNull('causer_id');
                }
            })
            ->get()
            ->groupBy(function (Activity $activity) {
                return $activity->created_at->format('Y-m-d');
            })
            ->map(function (Collection $group) {
                return $group->count();
            });
    }

    private function buildDays(): array
    {
        return DayOfWeek::getAll();
    }

    private function buildMonths(): Collection
    {
        $startDate = now()->subYear();
        $endDate = now();
        $startOfWeek = $startDate->copy()->startOfWeek();

        return collect(CarbonPeriod::create($startOfWeek, '1 week', $endDate))
            ->groupBy(fn(Carbon $date) => $date->format('Y-m'))
            ->map(function (Collection $weeks, string $yearMonth) {
                [, $month] = explode('-', $yearMonth);
                return new ChartMonth(
                    Month::fromNumber((int) $month),
                    $weeks->count()
                );
            })
            ->values();
    }

    public function getDays(): array
    {
        return $this->days;
    }

    public function getMonths(): Collection
    {
        return $this->months;
    }

    public function getSquares(): Collection
    {
        return $this->squares;
    }
}
