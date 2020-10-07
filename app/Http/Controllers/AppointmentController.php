<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    
    private function checkTimestampValidity($timestamp){

      // TODO: outsource to services

      if($timestamp !== date('c',strtotime($timestamp))){
        return false;
      }

      return true;
    }


    public function index(){
      // TODO: return list view
      return Appointment::with(['pharmacy', 'user'])->get();
      
    }

    public function show($appointmentId){
  
      // TODO: return detail view
      return Appointment::with(['pharmacy', 'user'])->find($appointmentId);
    }

    public function edit($appointmentId){
      
      // TODO: return edit view
      return Appointment::with(['pharmacy', 'user'])->find($appointmentId);

    }

    public function update(Request $request, $appointmentId){

      if(!$request->has([
        'user_id',
        'pharmacy_id','note_body',
        'starts_at',
        'ends_at'
      ]))
      {
        abort(400, 'Missing Values');
      }

      if(!$this->checkTimestampValidity($request->starts_at) || !$this->checkTimestampValidity($request->ends_at))
      {
        abort(400, 'Wrong Timestamp Format');
      }

      if(strtotime($request->starts_at)>=strtotime($request->ends_at)){
        abort(400, 'Start Time is before or equal to end time');
      }

      $appointment=Appointment::find($appointmentId);

      $appointment->user_id= $request->user_id;
      $appointment->pharmacy_id= $request->pharmacy_id;
      $appointment->note_body= $request->note_body;
      $appointment->starts_at= $request->starts_at;
      $appointment->ends_at= $request->ends_at;

      $appointment->save();

      return redirect('appointment/'.$appointment->id);

    }

    public function create(Request $request){

      //TODO:Is it possible to check, if the user is allowed to make the appointment? or should there be a default value?

      if(!$request->has([
        'user_id',
        'pharmacy_id','note_body',
        'starts_at',
        'ends_at'
      ]))
      {
        abort(400, 'Missing Values');
      }

      if(!$this->checkTimestampValidity($request->starts_at) || !$this->checkTimestampValidity($request->ends_at))
      {
        abort(400, 'Wrong Timestamp Format');
      }

      if(strtotime($request->starts_at)>=strtotime($request->ends_at)){
        abort(400, 'Start Time is before or equal to end time');
      }

      $newAppointment = Appointment::create([
      'user_id'=> $request->user_id,
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
      // TODO: change to accept arrays to allow mutliple deletes at once
      return Appointment::destroy($appointmentId);

    }
}
