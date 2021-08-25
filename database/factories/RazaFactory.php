<?php

namespace Database\Factories;

use App\Models\Raza;
use App\Models\Talla;
use Illuminate\Database\Eloquent\Factories\Factory;

class RazaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Raza::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'talla_id' =>Talla::all()->random()->id
        ];
    }
}
