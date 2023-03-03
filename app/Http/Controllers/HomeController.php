<?php

namespace App\Http\Controllers;

use App\Helpers\LogActivity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function myTestAddToLog()
    {
        LogActivity::addToLog('My Testing Add To Log.');
        dd('log insert successfully.');
    }


    public function logActivity()
    {
        $logs = LogActivity::logActivityLists();
        return view('admin.logs',compact('logs'));
    }
}
