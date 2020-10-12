<?php

namespace App\Http\Controllers;

use App\Models\Pharmacy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PharmacyController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
      // TODO: return list view
      // return Pharmacy::with(['user', 'region'])->get();
      $user = Auth::user();
      if($user->isAdmin()){
        return view('pharmacy.list', ['pharmacies'=> Pharmacy::with(['user', 'region'])->get()]);
      } else {
        return view('pharmacy.list', ['pharmacies'=> Pharmacy::with(['user', 'region'])->where('user_id','=',$user->id)->get()]);
      };
    }

    public function show($pharmacyId){
      // returns Pharmacy with associated user and region.
      // TODO: return detail view
      return view('pharmacy.detail',['pharmacy'=>Pharmacy::with(['appointments', 'region'])->find($pharmacyId)]);
    }

    public function edit($regionId){
      // returns Pharmacy with associated user
      
      // TODO: return edit view
      return view('pharmacy.edit', ['pharmacy' => Pharmacy::with(['user', 'region'])->find($regionId)]);

    }

    public function update(Request $request, $pharmacyId){

      // TODO: is it possible to update a user with just the region.name and without the region.id?
      // TODO: need to test if isDirty?

      $pharmacy=Pharmacy::find($pharmacyId);

      $pharmacy->name=$request->name;
      $pharmacy->region_id= $request->region_id;
      $pharmacy->user_id= $request->user_id;
      $pharmacy->adress_street= $request->adress_street;
      $pharmacy->adress_building_number= $request->adress_building_number;
      $pharmacy->adress_zip_code= $request->adress_zip_code;
      $pharmacy->adress_city= $request->adress_city;
      $pharmacy->contact_name= $request->contact_name;
      $pharmacy->contact_email= $request->contact_email;
      $pharmacy->contact_phone= $request->contact_phoe;

      return $pharmacy->save();
  
    }

    public function create(){
        // TODO: return list view
      // return Pharmacy::with(['user', 'region'])->get();
      $user = Auth::user();

      return view('pharmacy.create');
    }

    public function store(Request $request){
      // TODO: is it possible to create a user with just the region.name and without the region.id?
      // TODO: validate if the user is in the associated region
      // echo var_dump($request);
      // return true;
      if(!$request->has(['name',
      'adress_street',
      'adress_building_number',
      'adress_zip_code',
      'adress_city',
      ])){
        abort(400, 'Missing Values');
      }

      $newPharmacy = Pharmacy::create([
      'name'=> $request->name,
      'region_id'=> Auth::user()->region_id,
      'user_id'=> Auth::user()->id,
      'adress_street'=> $request->adress_street,
      'adress_building_number'=> $request->adress_building_number,
      'adress_zip_code'=> $request->adress_zip_code,
      'adress_city'=> $request->adress_city,
      'contact_name'=> $request->contact_name,
      'contact_phone'=> $request->contact_phone,
      'contact_email'=> $request->contact_email,
      'contact_name'
      ]);
      
      return redirect(route('pharmacy.show', $newPharmacy->id));

    }

    public function delete($regionId){
      // TODO: change to accept arrays to allow mutliple deletes at once
       Pharmacy::destroy($regionId);
       return view(route('pharmacy.index'));
    }


}
