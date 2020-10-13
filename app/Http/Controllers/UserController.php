<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use Illuminate\Auth\Events\Validated;
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
      // TODO: change authorization
      // $this->authorize('viewAny', [Auth::user()]);

      return view('user.index', ['users' => User::with('region')->get()]);
    }

    public function show(User $user){
      
      //  TODO: restrict the region by only showing the name
      // $this->authorize('view', [Auth::user()]);
      dd(compact($user));
      return view('user.detail', compact($user));

    }

    public function edit(User $user){
      // TODO: change authorization
      // $this->authorize('update', [Auth::user()]);
      return view('user.edit', ['user' => $user, 'regions' => Region::all()]);
    }

    public function update(Request $request, User $user){
      // 
      // $this->authorize('update',[Auth::user()]);

      // $userToUpdate = User::find($userId);
      // $userToUpdate->region_id = $request->region;
      // $userToUpdate->name = $request->name;
      // $userToUpdate->email = $request->email;
      // $userToUpdate->role = $request->role; 

      $user->update($this->validation($request));
      // TODO: change to view(user.edit)
      return redirect(route('user.show', $user));
    }

    public function create(){
      $this->authorize('create',[Auth::user()]);
      
      return view('user.create', ['regions' => Region::all()]);
    }

    public function store(Request $request){
      // TODO: is it possible to create a user with just the region.name and without the region.id?
      // $this->authorize('create',[Auth::user()] );
      // dd($request->role);
      $validatedFields =$this->validation($request);
      $validatedFields['password'] = Hash::make('1234');

      return redirect("user.show", User::create($validatedFields));
    
    }

    public function delete(User $user){
      // TODO: change to accept arrays to allow mutliple deletes at once

      $this->authorize('delete', [Auth::user()]);
      // User::destroy($userId);
      $user->destroy();
      return redirect(route('user.index'));
    }

    private function validation(Request $request){
      return $request->validate([
        'name' => 'required',
        'email' => 'required',
        'role' => 'required',
      ]);
    }
}
