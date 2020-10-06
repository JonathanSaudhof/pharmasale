<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Region;
use Illuminate\Support\Facades\Hash;
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      $regions = [
        1 => 'north',
        2 => 'east',
        3 => 'west',
        4 => 'south',
      ];

      $random = mt_rand(1, 10);

      return [
          'name' => $this->faker->name,
          'email' => $this->faker->unique()->safeEmail,
          'email_verified_at' => now(),
          'region_id' => Region::where('name','=',$regions[mt_rand(1,4)])->first(),
          'password' => Hash::make('1234'), // password
          'role' => $random >= 9 ? 'admin' : 'user',
          'remember_token' => Str::random(10),
      ];
    }
}
