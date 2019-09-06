<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReadChapter extends Model
{
    protected $fillable = [
        'chapter_id',
        'user_id',
    ];
}
