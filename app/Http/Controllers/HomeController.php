<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\DomainChart;
use App\Models\domain;
use App\Models\servers;
use App\Models\hosts;

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
        $domain = Domain::all();
        $hosts = Hosts::all();
        $servers = Servers::all();

        $chart = new DomainChart();
        return view('home')->with(['chartDomain'=> $chart->build([$domain->count(), $hosts->count(), $servers->count()])]);
    }
}
