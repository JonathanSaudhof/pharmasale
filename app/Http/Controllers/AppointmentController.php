<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Pharmacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Phar;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = Auth::user();

        return view('appointment.index', ['appointments'=>Appointment::allMyAppointments($user)]);
    }

    public function show(Appointment $appointment)
    {
        return view('appointment.detail', ['appointment'=> $appointment]) ;
    }

    public function edit(Appointment $appointment)
    {
        $user = Auth::user();
        return view('appointment.edit', ['appointment'=> $appointment, 'pharmacies'=> Pharmacy::allMyPharmacies($user)]);
    }

  

    public function update(Request $request, Appointment $appointment)
    {
        // ddd($request);
        $updateData = $this->validation($request);
        $updateData['user_id'] = Pharmacy::find($request->pharmacy_id)->user_id;

        $appointment->update($updateData);

        return redirect(route('appointment.show', $appointment));
    }


    public function create($pharmacyId=null)
    {
        $user = Auth::user();
        return view('appointment.create', ['pharmacies'=> Pharmacy::allMyPharmacies($user),'forPharmacyId'=>$pharmacyId]);
    }
    public function store(Request $request)
    {
        // dd($request->request);
        return redirect(route('appointment.show', Appointment::create($this->validation($request))));
    }

    public function delete($appointmentId)
    {
        Appointment::destroy($appointmentId);

        return redirect(route('appointment.index'));
    }

    private function validation(Request $request)
    {
        // dd($request->validated());
        return $request->validate([
        'pharmacy_id'=> "required|numeric",
        'starts_at'=> "required|string",
        'ends_at'=> "required|string",
        'note_body' => "string"
      ]);
    }
}
