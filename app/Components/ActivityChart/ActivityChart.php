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

        for ($i = 0; $i < $emptySquaresCount; $i += 1) {
            $squares->prepend(null);
        }

        return $squares;
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
        $startDate = now()->subYear();
        $endDate = now();
        $currentDate = $startDate->copy()->startOfWeek();

        $months = [];
        $currentMonth = null;
        $weekCount = 0;

        while ($currentDate->lte($endDate)) {
            $monthNumber = $currentDate->month;

            if ($currentMonth !== $monthNumber) {
                if ($currentMonth !== null) {
                    $months[] = [
                        'month' => Month::fromNumber($currentMonth),
                        'weeks' => $weekCount,
                    ];
                }
                $currentMonth = $monthNumber;
                $weekCount = 1;
            } else {
                $weekCount += 1;
            }

            $currentDate->addWeek();
        }

        if ($currentMonth !== null) {
            $months[] = [
                'month' => Month::fromNumber($currentMonth),
                'weeks' => $weekCount,
            ];
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
