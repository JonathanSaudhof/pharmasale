<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("/user")->group(function(){
  Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
  Route::get('/{userId}', [App\Http\Controllers\UserController::class, 'show']);
  Route::get('/{userId}/edit', [App\Http\Controllers\UserController::class, 'edit']);
  Route::post('/',[App\Http\Controllers\UserController::class, 'create']);
  Route::put('/{userId}',[App\Http\Controllers\UserController::class, 'update']);
  Route::delete('/{userId}',[App\Http\Controllers\UserController::class, 'delete']);
});

Route::prefix("/region")->group(function(){
  Route::get('/', [App\Http\Controllers\RegionController::class, 'index']);
  Route::get('/{regionId}', [App\Http\Controllers\RegionController::class, 'show']);
  Route::get('/{regionId}/edit', [App\Http\Controllers\RegionController::class, 'edit']);
  Route::post('/',[App\Http\Controllers\RegionController::class, 'create']);
  Route::put('/{regionId}',[App\Http\Controllers\RegionController::class, 'update']);
  Route::delete('/{regionId}',[App\Http\Controllers\RegionController::class, 'delete']);
});

Route::prefix("/pharmacy")->group(function(){
  Route::get('/', [App\Http\Controllers\PharmacyController::class, 'index']);
  Route::get('/{pharmacyId}', [App\Http\Controllers\PharmacyController::class, 'show']);
  Route::get('/{pharmacyId}/edit', [App\Http\Controllers\PharmacyController::class, 'edit']);
  Route::post('/',[App\Http\Controllers\PharmacyController::class, 'create']);
  Route::put('/{pharmacyId}',[App\Http\Controllers\PharmacyController::class, 'update']);
  Route::delete('/{pharmacyId}',[App\Http\Controllers\PharmacyController::class, 'delete']);
});

Route::prefix("/appointment")->group(function(){
  Route::get('/', [App\Http\Controllers\AppointmentController::class, 'index']);
  Route::get('/{appointmentId}', [App\Http\Controllers\AppointmentController::class, 'show']);
  Route::get('/{appointmentId}/edit', [App\Http\Controllers\AppointmentController::class, 'edit']);
  Route::post('/',[App\Http\Controllers\AppointmentController::class, 'create']);
  Route::put('/{appointmentId}',[App\Http\Controllers\AppointmentController::class, 'update']);
  Route::delete('/{appointmentId}',[App\Http\Controllers\AppointmentController::class, 'delete']);
});


