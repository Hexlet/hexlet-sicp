<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PagesController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int|string $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id): View
    {
        return view("pages.{$id}");
    }
}
