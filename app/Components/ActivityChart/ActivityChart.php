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
    private array $months;
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

        return collect(CarbonPeriod::create(now()->subMonths(12), '1 day', now()))
            ->map(function (Carbon $date) use ($activitiesByDay): Square {
                $day = $date->format('Y-m-d');
                $count = $activitiesByDay->get($day, 0);

                return new Square($date, $count);
            });
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

    private function buildMonths(): array
    {
        $currentMonth = now()->month;
        $months = [];

        for ($i = 1; $i <= 12; $i = $i + 1) {
            $monthNumber = ($currentMonth + $i - 1) % 12 + 1;
            $months[] = Month::fromNumber($monthNumber);
        }

        return $months;
    }

    public function getDays(): array
    {
        return $this->days;
    }

    public function getMonths(): array
    {
        return $this->months;
    }

    public function getSquares(): Collection
    {
        return $this->squares;
    }
}
