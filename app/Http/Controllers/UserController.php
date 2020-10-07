<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
      //TODO: add authorization: admin only
      
    }
  
    public function index(){
      // TODO: change to view(user.overview)
    
      return User::with('region')->get();
    }

    public function show($userId){
      // TODO: change to change to view(user.profile)
      //  TODO: restrict the region by only showing the name
      
      return User::with('region')->find($userId);

    }

    public function edit($userId){
      // TODO: change to view(user.edit)
      return User::with('region')->find($userId);
    }

    public function update(Request $request, $userId){

      // TODO: is it possible to update a user with just the region.name and without the region.id?

      $user = User::find($userId);
      $user->region_id = $request->region_id;
      $user->name = $request->name;
      $user->email = $request->email;
      $user->role = $request->role; 

      return $user->save();
      // TODO: change to view(user.edit)
      // return User::where('id', '=', $userId)->first();
    }
    public function create(Request $request){
      // TODO: is it possible to create a user with just the region.name and without the region.id?
      User::create([
        'name' =>$request->name,
        'region_id' => $request->reqion_id,
        'email' => $request->email,
        'role' => $request->role,
        'password'=>$request->password,
      ]);
    }

    public function delete($userId){
      // TODO: change to accept arrays to allow mutliple deletes at once
      return User::destroy($userId);

    }
}
