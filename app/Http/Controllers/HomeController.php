<?php

namespace App\Http\Controllers;

use App\Airbalon;
use App\AtoB;
use App\Attendance;
use App\Booking;
use App\CarRent;
use App\Employee;
use App\RestBooking;
use App\Ticket;
use App\Tour;
use App\Transfer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee=Employee::all();
        $user=User::all();
        $attendance=Attendance::all();
        return view('home',['employee'=>$employee,'user'=>$user,'attendance'=>$attendance]);
    }
}
