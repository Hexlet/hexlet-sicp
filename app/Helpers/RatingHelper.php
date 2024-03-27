<?php

namespace App\Helpers;

use App\Models\User;
use Illuminate\Support\Collection;

class RatingHelper
{
    public static function getCalculatedRating(): Collection
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
