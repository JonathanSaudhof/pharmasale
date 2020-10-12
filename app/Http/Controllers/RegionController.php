<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RegionController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
      // TODO: return list view
      $this->authorize('viewAny', [Auth::user()]);
      return view('region.list', ['regions' =>Region::all()]);
    }

    public function show($regionId){
      // returns Region with associated users
      // TODO: return detail view
      $this->authorize('view', [Auth::user()]);
      return view('region.detail',['region'=> Region::with('users')->find($regionId)]);
    }

    public function edit($regionId){
      // returns Region with associated users
      // TODO: return edit view
      $this->authorize('update', [Auth::user()]);
      return view('region.edit',['region'=>Region::with('users')->find($regionId)]);

    }

    public function update(Request $request, $regionId){

      // TODO: is it possible to update a user with just the region.name and without the region.id?
      $this->authorize('update', [Auth::user()]);
      $region = Region::find($regionId);
      $region->name = $request->name;
      $region->save();

      return redirect('region/'.$region->id);
   
    }
    public function create(){
      $this->authorize('create',[Auth::user()]);

      return view('region.create');
    }

    public function store(Request $request){
      // TODO: is it possible to create a user with just the region.name and without the region.id?
      
      if(!$request->has('name')){
        abort(400, "Missing Name");
      };
      
      $newRegion = Region::create([
        'name' =>$request->name,
      ]);
      return redirect(route('region.show'),$newRegion->id);
    }

    public function delete($regionId){
      // TODO: change to accept arrays to allow mutliple deletes at once
       Region::destroy($regionId);
       return redirect(route('region.index'));
    }


}
