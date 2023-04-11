<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use LaravelLocalization;

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
        $locale = LaravelLocalization::getCurrentLocale();
        $view = "pages.{$id}.{$locale}";

        abort_if(!view()->exists($view), 404);

        return view($view);
    }
}
