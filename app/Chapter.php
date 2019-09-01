<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'number', 'name', 'description', 'parent_id'
    ];
}
