<?php

namespace App\Http\Controllers\Pages;

use Illuminate\View\View;

class PagesController
{
    public function show($alias): View
    {
        return view("pages.$alias", compact([]));
    }
}
