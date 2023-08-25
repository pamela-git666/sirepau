<?php

namespace Database\Factories;

use App\Models\Autoridad;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AutoridadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Autoridad::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        return [

                'ci'  => $this->faker->numberBetween($min = 99999, $max = 100000000),
               // 'extension'  =>  $this->faker->randomElement(['LP','OR','TJ','SC','CB','CH','BE','PD','PT']),
                'apellidos'  => $this->faker->text(20),
                'nombres'  => $this->faker->text(20),
                'cargo'  =>  $this->faker->randomElement(['Alcalde', 'Consejal', 'Director']),
                'celular'  => $this->faker->numberBetween($min = 600000000, $max =800000000 ),
                'user_id'  => $this->faker->numberBetween($min = 2, $max =23 ),
        ];

    }
}
