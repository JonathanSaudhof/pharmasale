<?php

namespace App\Http\Controllers;

use App\Models\Region;

use Illuminate\Http\Request;

class RegionController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
      
      return view('region.index', ['regions' => Region::all()]);
    }

    public function show(Region  $region){
      
      return view('region.detail',['region'=> $region, 'users' => $region->users()->get()]);
    }

    public function edit(Region $region){
      
      return view('region.edit', ['region' => $region]);

    }

    public function update(Request $request, Region $region){

      return redirect(route('region.show', $region->update($this->validation($request))));
   
    }
    public function create(){

      return view('region.create');

    }

    public function store(Request $request){
      
      return redirect(route('region.show', Region::create($this->validation($request))));

    }

    public function destroy(Region $region){
      
       $region->delete();
       return redirect(route('region.index'));

    }
    private function validation(Request $request){

      return $request->validate([
        'name' => 'required',
      ]);

    }


}
