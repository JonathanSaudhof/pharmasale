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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix("/user")->group(function(){
  Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
  Route::get('/{userId}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
  Route::get('/{userId}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
  Route::post('/',[App\Http\Controllers\UserController::class, 'create'])->name('user.create');
  Route::put('/{userId}',[App\Http\Controllers\UserController::class, 'update'])->name('user.update');
  Route::delete('/{userId}',[App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
});

Route::prefix("/region")->group(function(){
  Route::get('/', [App\Http\Controllers\RegionController::class, 'index'])->name('region.index');
  Route::get('/{regionId}', [App\Http\Controllers\RegionController::class, 'show'])->name('region.show');
  Route::get('/{regionId}/edit', [App\Http\Controllers\RegionController::class, 'edit'])->name('region.edit');
  Route::post('/',[App\Http\Controllers\RegionController::class, 'create'])->name('region.create');
  Route::put('/{regionId}',[App\Http\Controllers\RegionController::class, 'update'])->name('region.update');
  Route::delete('/{regionId}',[App\Http\Controllers\RegionController::class, 'delete'])->name('region.delete');
});

Route::prefix("/pharmacy")->group(function(){
  Route::get('/', [App\Http\Controllers\PharmacyController::class, 'index'])->name('pharmacy.index');
  Route::get('/{pharmacyId}', [App\Http\Controllers\PharmacyController::class, 'show'])->name('pharmacy.show');
  Route::get('/{pharmacyId}/edit', [App\Http\Controllers\PharmacyController::class, 'edit'])->name('pharmacy.edit');
  Route::post('/',[App\Http\Controllers\PharmacyController::class, 'create'])->name('pharmacy.create');
  Route::put('/{pharmacyId}',[App\Http\Controllers\PharmacyController::class, 'update'])->name('pharmacy.update');
  Route::delete('/{pharmacyId}',[App\Http\Controllers\PharmacyController::class, 'delete'])->name('pharmacy.delete');
});

Route::prefix("/appointment")->group(function(){
  Route::get('/', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment.index');
  Route::get('/{appointmentId}', [App\Http\Controllers\AppointmentController::class, 'show'])->name('appointment.show');
  Route::get('/{appointmentId}/edit', [App\Http\Controllers\AppointmentController::class, 'edit'])->name('appointment.edit');
  Route::post('/',[App\Http\Controllers\AppointmentController::class, 'create'])->name('appointment.create');
  Route::put('/{appointmentId}',[App\Http\Controllers\AppointmentController::class, 'update'])->name('appointment.update');
  Route::delete('/{appointmentId}',[App\Http\Controllers\AppointmentController::class, 'delete'])->name('appointment.delete');
});


