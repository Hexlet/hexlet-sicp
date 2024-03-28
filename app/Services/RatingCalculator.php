<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Collection;

class RatingCalculator
{
    public static function calculate(): Collection
    {
        $ratings = User::select('users.*')
            ->selectRaw('DENSE_RANK() OVER (ORDER BY points desc, created_at) AS position')
            ->where('points', '>', 0)
            ->limit(100)
            ->get()
            ->keyBy('id');
        return $ratings;
    }
}
