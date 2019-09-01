<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'number', 'name', 'description', 'parent_id'
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parentCategory()
    {
        return $this->hasMany(self::class, 'id', 'parent_id');
    }
}
