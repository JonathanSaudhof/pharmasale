<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            
            'pharmacy_id' => function(array $attributes)
              {
                return Pharmacy::where('user_id','=', $attributes['user_id'])->first()->id;
              },
            'starts_at' => $this->faker->dateTimeThisYear($min = 'now'),
            'ends_at' =>function(array $attributes) 
                        { 
                          return $this->faker->dateTimeBetween($startDate = $attributes['starts_at'], $endDate = '+1 hour', $timezone = null);
                        }, // DateTime('2003-03-15 02:00:49', 'Africa/Lagos')
            'note_body' => '<h1> This is a note</h1><div class="content">'.$this->faker->realText($maxNbChars = 200, $indexSize = 2).'</div>',
        ];
    }
}
