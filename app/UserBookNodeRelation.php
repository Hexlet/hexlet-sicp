<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBookNodeRelation extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
