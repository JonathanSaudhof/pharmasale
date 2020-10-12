<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Pharmacy;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Region;
use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

      DB::table('regions')->insert([
        ['name'=>'north', 'created_at'=>Carbon::now()->toDateTimeString() ],
        ['name'=>'east', 'created_at'=>Carbon::now()->toDateTimeString() ],
        ['name'=>'south', 'created_at'=>Carbon::now()->toDateTimeString() ],
        ['name'=>'west', 'created_at'=>Carbon::now()->toDateTimeString() ],
        ]);

      // Create one admin
      User::factory(1)->create(['role' => 'admin', 'email' => 'admin@example.com']);

      // Create one example user
      User::factory(1)->hasPharmacies(3)->create(['role' => 'user', 'email' => 'user@example.com'])->each(function($user){
        
        $pharmacies = Pharmacy::where('user_id', '=', $user->id)->get();

        foreach($pharmacies as &$pharmacy){
          Appointment::factory(1)->create(['user_id'=>$user->id,'pharmacy_id'=>$pharmacy->id]);
        }
      });;

      // Create 10 other sales guys
      User::factory(10)->hasPharmacies(3)->create(['role' => 'user'])->each(function($user){
        
        $pharmacies = Pharmacy::where('user_id', '=', $user->id)->get();

        foreach($pharmacies as &$pharmacy){
          Appointment::factory(1)->create(['user_id'=>$user->id,'pharmacy_id'=>$pharmacy->id]);
        }
      });
      
    }
}
