<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookNode;
use App\Helpers\BookNodeHelpers;
use Illuminate\Auth\Authenticatable;

class HomeController extends Controller
{
    use Authenticatable;

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index', ['nodes' => BookNode::all()]);
    }
}
