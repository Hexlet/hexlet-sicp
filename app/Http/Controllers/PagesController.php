<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param int|string $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        return view("pages.{$id}");
    }
}
