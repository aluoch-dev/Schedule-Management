<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;

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
        $appointments = Appointment::orderByDesc('created_at')->take(8)->get();
        return view('home',get_defined_vars());
    }
}
