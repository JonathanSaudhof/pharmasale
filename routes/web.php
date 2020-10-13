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
    return redirect('home');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resources([
  'user' => App\Http\Controllers\UserController::class,
  'region' => App\Http\Controllers\RegionController::class,
  'pharmacy' => App\Http\Controllers\PharmacyController::class,
  'appointment' => App\Http\Controllers\AppointmentController::class
]);



