<?php

namespace App;

use App\Traits\RecordActivity;
use Illuminate\Database\Eloquent\Model;

class ReadChapter extends Model
{
    use RecordActivity;

    protected $fillable = [
        'chapter_id',
    ];
}
