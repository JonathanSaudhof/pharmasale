<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    //
    public function __construct()
    {
      
    }

    public function index(){
      // TODO: return list view
      return Region::all();
    }

    public function show($regionId){
      // returns Region with associated users
      // TODO: return detail view
      return Region::with('users')->find($regionId);
    }

    public function edit($regionId){
      // returns Region with associated users
      // TODO: return edit view
      return Region::with('users')->find($regionId);

    }

    public function update(Request $request, $regionId){

      // TODO: is it possible to update a user with just the region.name and without the region.id?

      $region = Region::find($regionId);
      $region->name = $request->name;
      $region->save();

      return redirect('region/'.$region->id);
   
    }

    public function create(Request $request){
      // TODO: is it possible to create a user with just the region.name and without the region.id?
      
      if(!$request->has('name')){
        abort(400, "Missing Name");
      };
      
      $newRegion = Region::create([
        'name' =>$request->name,
      ]);
      return redirect('region/'.$newRegion->id);
    }

    public function delete($regionId){
      // TODO: change to accept arrays to allow mutliple deletes at once
      return Region::destroy($regionId);

    }


}
