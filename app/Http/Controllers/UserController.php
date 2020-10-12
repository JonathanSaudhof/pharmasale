<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
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

    public function edit($userId){

      $this->authorize('update', [Auth::user()]);
      return view('user.edit', ['user' => User::with('region')->find($userId), 'regions' => Region::all()]);
    }

    public function update(Request $request, $userId){
      // dd($request);
      $this->authorize('update',[Auth::user()]);

      $userToUpdate = User::find($userId);
      $userToUpdate->region_id = $request->region;
      $userToUpdate->name = $request->name;
      $userToUpdate->email = $request->email;
      $userToUpdate->role = $request->role; 

      $userToUpdate->save();
      // TODO: change to view(user.edit)
      return redirect(route('user.show', $userId));
    }

    public function create(){
      $this->authorize('create',[Auth::user()]);
      
      return view('user.create', ['regions' => Region::all()]);
    }

    public function store(Request $request){
      // TODO: is it possible to create a user with just the region.name and without the region.id?
      $this->authorize('create',[Auth::user()] );
      // dd($request->role);
      $newUsr = User::create([
        'name' =>$request->name,
        'region_id' => $request->region,
        'email' => $request->email,
        'role' => $request->role,
        'password'=>Hash::make($request->password),
      ]);
      return redirect(route("user.show", $newUsr->id));
    }

    public function destroy($userId){
      // TODO: change to accept arrays to allow mutliple deletes at once

      $this->authorize('delete', [Auth::user()]);
      User::destroy($userId);
      return redirect(route('user.index'));
    }
}
