<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pharmacy;
use App\Models\User;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (auth()->user()->isAdmin()) {
            $data = [
            'userCount' => User::countAll(),
            'regionCount' => Region::all()->count()
          ];
        } else {
            $data = [
            'lastAppointment' => Appointment::where('starts_at', '<=', date('c'))->orderBy('starts_at', 'desc')->first(),
            'todaysAppointments' => Appointment::where('starts_at', '=', date('c'))->orderBy('starts_at', 'asc')->get(),
            'nextAppointment' => Appointment::where('starts_at', '>=', date('c'))->orderBy('starts_at', 'asc')->first(),
            'lastPharmacy' => Pharmacy::latest('updated_at')->first()
          ];
        };

        return view('home', ['data' => $data]);
    }
}
