<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusType;
use App\BusLayout;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $bus_types = BusType::all();
        $bus_layouts = BusLayout::all();


        return view('home', compact('bus_types','bus_layouts'));
        
    }
}
