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