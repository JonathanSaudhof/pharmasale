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
    
    private function checkTimestampValidity($timestamp){

      // TODO: outsource to services

      if($timestamp !== date('c',strtotime($timestamp))){
        return false;
      }

      return true;
    }


    public function index(){
    
      $currentUser = Auth::user();
      // $this->authorize('viewAny', [$currentUser]);

      if($currentUser->isAdmin()){
        return view('appointment.list',['appointments'=> Appointment::with(['pharmacy', 'user'])->orderBy('starts_at','asc')->get()]);
      }else {
        return view('appointment.list', ['appointments'=> Appointment::with(['pharmacy', 'user'])->where('user_id', '=', $currentUser->id)->get()]);
      }
      
    }

    public function show($appointmentId){
      return view('appointment.detail', ['appointment'=>Appointment::with(['pharmacy', 'user'])->find($appointmentId)]) ;
    }

    public function edit($appointmentId){
      
      if(Auth::user()->isAdmin()){
        return view('appointment.edit', ['appointment'=>Appointment::with(['pharmacy', 'user'])->find($appointmentId), 'pharmacies'=> Pharmacy::all()]);
      } else {
        
        return view('appointment.edit', ['appointment'=>Appointment::with(['pharmacy', 'user'])->find($appointmentId), 'pharmacies'=> Pharmacy::where('user_id','=', Auth::user()->id)->get()]);
      }
    }

  

    public function update(Request $request, $appointmentId){

      $appointment=Appointment::find($appointmentId);

      $appointment->user_id= Pharmacy::find($request->pharmacy_id)->user_id;
      $appointment->pharmacy_id= $request->pharmacy_id;
      $appointment->note_body= $request->note_body;
      $appointment->starts_at= $request->starts_at;
      $appointment->ends_at= $request->ends_at;

      $appointment->save();

      return redirect('appointment/'.$appointment->id);

    }


    public function create($pharmacyId=null){
      // dd($pharmacyId);
      if(Auth::user()->isAdmin()){
        return view('appointment.create', ['pharmacies'=> Pharmacy::all(),'forPharmacyId'=>$pharmacyId]);
      } else {
        
        return view('appointment.create', ['pharmacies'=> Pharmacy::where('user_id','=', Auth::user()->id)->get(), 'forPharmacyId'=>$pharmacyId]);
      }
    }
    public function store(Request $request){

      //TODO:Is it possible to check, if the user is allowed to make the appointment? or should there be a default value?


      $newAppointment = Appointment::create([
      'user_id'=> Pharmacy::find($request->pharmacy_id)->user_id,
      'pharmacy_id'=> $request->pharmacy_id,
      'note_body'=> $request->note_body,
      'starts_at'=> $request->starts_at,
      'ends_at'=> $request->ends_at
      ]);
      
      // TODO: forward to Details page of Pharmacy
      return redirect('appointment/'.$newAppointment->id);
      //return $newPharmacy;

    }

    public function delete($appointmentId){
    
      Appointment::destroy($appointmentId);

      return redirect(route('appointment.index'));
    }
}
