<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GithubAccount extends Model
{
    use SoftDeletes;

    protected $fillable = ['nickname'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
