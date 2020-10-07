<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    //
    public function __construct()
    {
      
    }

    public function index(){
      // TODO: return list view
      return Pharmacy::with(['user', 'region'])->get();
    }

    public function show($regionId){
      // returns Pharmacy with associated user and region.
      // TODO: return detail view
      return Pharmacy::with(['user', 'region'])->find($regionId);
    }

    public function edit($regionId){
      // returns Pharmacy with associated user
      
      // TODO: return edit view
      return Pharmacy::with('users')->find($regionId);

    }

    public function update(Request $request, $regionId){

      // TODO: is it possible to update a user with just the region.name and without the region.id?
      // TODO: need to test if isDirty?

      $pharmacy=Pharmacy::find($regionId);

      $pharmacy->name=$request->name;
      $pharmacy->region_id= $request->region_id;
      $pharmacy->user_id= $request->user_id;
      $pharmacy->adress_street= $request->adress_street;
      $pharmacy->adress_building_number= $request->adress_building_number;
      $pharmacy->adress_zip_code= $request->adress_zip_code;
      $pharmacy->adress_city= $request->adress_city;
      $pharmacy->contact_first_name= $request->contact_first_name;
      $pharmacy->contact_last_name= $request->contact_last_name;
      $pharmacy->contact_email= $request->contact_email;
      $pharmacy->contact_phone= $request->contact_phoe;

      return $pharmacy->save();
   
    }

    public function create(Request $request){
      // TODO: is it possible to create a user with just the region.name and without the region.id?
      // TODO: validate if the user is in the associated region
      // echo var_dump($request);
      // return true;
      if(!$request->has(['name',
      'region_id',
      'user_id',
      'adress_street',
      'adress_building_number',
      'adress_zip_code',
      'adress_city',
      'contact_first_name',
      'contact_last_name',
      'contact_email',
      'contact_phone'])){
        abort(400, 'Missing Values');
      }

      $newPharmacy = Pharmacy::create([
      'name'=> $request->name,
      'region_id'=> $request->region_id,
      'user_id'=> $request->user_id,
      'adress_street'=> $request->adress_street,
      'adress_building_number'=> $request->adress_building_number,
      'adress_zip_code'=> $request->adress_zip_code,
      'adress_city'=> $request->adress_city,
      'contact_first_name'=> $request->contact_first_name,
      'contact_last_name'=> $request->contact_last_name,
      'contact_email'=> $request->contact_email,
      'contact_phone'=> $request->contact_phone,
      ]);
      
      // TODO: forward to Details page of Pharmacy
      return redirect('pharmacy/'.$newPharmacy->id);
      //return $newPharmacy;

    }

    public function delete($regionId){
      // TODO: change to accept arrays to allow mutliple deletes at once
      return Pharmacy::destroy($regionId);

    }


}
