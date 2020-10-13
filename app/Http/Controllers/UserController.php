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
      return view('user.index', ['users' => User::with('region')->get()]);
    }

    public function show(User $user){
      
      return view('user.detail', ['user'=>$user]);

    }

    public function edit(User $user){

      return view('user.edit', ['user' => $user, 'regions' => Region::all()]);
    }

    public function update(Request $request, User $user){

      $user->update($this->validation($request));
      
      return redirect(route('user.show', $user));
    }

    public function create(){
            
      return view('user.create', ['regions' => Region::all()]);

    }

    public function store(Request $request){
      // TODO: is it possible to create a user with just the region.name and without the region.id?

      $validatedFields = $this->validation($request);
      $validatedFields['password'] = Hash::make('1234');

      return redirect("user.show", User::create($validatedFields));
    
    }

    public function destroy(User $user){
      // TODO: change to accept arrays to allow mutliple deletes at once
      $user->delete();
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
