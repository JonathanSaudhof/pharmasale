<?php

namespace Database\Factories;

use App\Models\Pharmacy;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PharmacyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pharmacy::class;

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

        return [
            //
            'name' => "Pharmacy ".$this->faker->company,
            'adress_street' => $this->faker->streetAddress,
            'adress_building_number' => $this->faker->buildingNumber,
            'adress_zip_code' => $this->faker->postcode,
            'adress_city' => $this->faker->city,
            'contact_name' => $this->faker->name,
            'contact_email' => $this->faker->companyEmail,
            'contact_phone' => $this->faker->phoneNumber,
            'user_id' => User::factory(),
            // 'user_id' => 1,
            'region_id' => function(array $attributes){
              return User::find($attributes['user_id'])->region_id;
            },
        ];
    }
}
