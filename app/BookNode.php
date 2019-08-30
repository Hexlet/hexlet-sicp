<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookNode extends Model
{
    public function childs()
    {
        return $this->hasMany('App\BookNode', 'parent_id', 'id');
    }

    public function selectChilds(array $allChilds=[]): array
    {
        if ($this->childs()->get()->isEmpty()) {
            return $allChilds;
        }

        $childs = $this->childs()->get();

        $allChilds = array_merge($allChilds, $childs->toArray());

        foreach ($childs as $child) {
            $allChilds = array_merge($allChilds, $child->selectChilds());
        }

        return $allChilds;
    }
}
