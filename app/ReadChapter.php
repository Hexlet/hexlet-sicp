<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ReadChapter extends Model
{
    use LogsActivity;

    protected $fillable = ['chapter_id'];

    protected static $recordEvents = ['created'];
}
