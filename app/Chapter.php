<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function getParent()
    {
        return $this->where('number', 'like', substr($this->number, 0, -2))->first();
    }

    public function getChildren()
    {
        return $this->where('number', 'like', "{$this->number}._")->get();
    }

    public function getNameAttribute()
    {
        return __(sprintf('sicp.chapters.%s', $this->number));
    }
}
