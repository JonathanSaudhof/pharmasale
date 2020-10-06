<?php

namespace Database\Seeders;

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
        
      // User::factory(10)->create();


      
      DB::table('regions')->insert([
        ['name'=>'north', 'created_at'=>Carbon::now()->toDateTimeString() ],
        ['name'=>'east', 'created_at'=>Carbon::now()->toDateTimeString() ],
        ['name'=>'south', 'created_at'=>Carbon::now()->toDateTimeString() ],
        ['name'=>'weset', 'created_at'=>Carbon::now()->toDateTimeString() ],
        ]);
      
      User::factory(10)->create();
      
    }
}
