<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
  
    public function index(){
      // TODO: change to view(user.overview)
      $this->authorize('viewAny', [Auth::user()]);
 
      return view('user.list', ['users' => User::with('region')->get()]);
    }

    public function show($userId){
      // TODO: change to change to view(user.profile)
      //  TODO: restrict the region by only showing the name
      $this->authorize('view', [Auth::user()]);
      // ddd($userId);
      return view('user.detail', ['user'=> User::with('region')->find($userId)]);

    }

    public function edit(User $user){
      // TODO: change to view(user.edit)
      $this->authorize('view');
      return User::with('region')->find($user->id);
    }

    public function update(Request $request,User $user){

      $this->authorize('update');

      $userToUpdate = User::find($user->id);
      $userToUpdate->region_id = $request->region_id;
      $userToUpdate->name = $request->name;
      $userToUpdate->email = $request->email;
      $userToUpdate->role = $request->role; 

      return $user->save();
      // TODO: change to view(user.edit)
    }
    public function create(Request $request){
      // TODO: is it possible to create a user with just the region.name and without the region.id?
      $this->authorize('create');
      
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

      $this->authorize('delete');

      return User::destroy($userId);

    }
}
