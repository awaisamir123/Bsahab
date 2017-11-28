<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\destination;
use App\vehicle;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bestDastination = destination::inRandomOrder()->limit(1)->first();
        $vehicles = vehicle::all();
        $destinations = Destination::limit(4)->get();
        return view('home.index',compact('destinations','bestDastination','vehicles'));
    }
}
